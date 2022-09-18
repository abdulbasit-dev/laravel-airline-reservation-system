<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\WorkTime;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkTimeCollection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Arr;
use Illuminate\Support\Facades\DB;

class WorkTimeController extends Controller
{
    public function userWork(Request $request)
    {
        $searchQuery = request()->all();
        $month = Arr::get($searchQuery, 'month', '');
        $year = Arr::get($searchQuery, 'year', '');

        $workTimes = WorkTime::query()
            ->whereUserId(auth()->id())
            ->when($month, function ($query) use ($month) {
                return $query->whereMonth('created_at', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->whereYear('created_at', $year);
            })
            ->orderByDesc('created_at')
            ->get();

        return new WorkTimeCollection($workTimes->groupBy('created_at'));
    }

    public function workStatus()
    {
        $workTime = auth()->user()
            ->workTimes->last();

        $status = $workTime->end_time == null ? 'in_work' : 'out_work';

        return $this->josnResponse(true, __('api.work_status'), Response::HTTP_OK, $status);
    }

    public function startWork(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            "start_lat" => ['required'],
            "start_long" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        // check if user already stated the work 
        $workTime = WorkTime::query()
            ->orderBy('id', 'desc')
            ->where('user_id', $request->user()->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        // first he should stop the work if he started it before, then start it again
        if (!$workTime) {
            // create today work time
            WorkTime::create([
                "user_id" => $request->user()->id,
                "start_lat" => $request->start_lat,
                "start_long" => $request->start_long,
                "start_time" => now(),
            ]);
        } else {
            // if he didn't stop the work yet, then stop it
            if (!$workTime->end_time == null) {
                WorkTime::create([
                    "user_id" => $request->user()->id,
                    "start_lat" => $request->start_lat,
                    "start_long" => $request->start_long,
                    "start_time" => now(),
                ]);
            } else {
                return $this->josnResponse(true, __('api.finish_work_time'), Response::HTTP_OK);
            }
        }

        return $this->josnResponse(true, __('api.user_work_started'), Response::HTTP_OK);
    }

    public function endWork(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            "end_lat" => ['required'],
            "end_long" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        // find worktime by user id and today date
        $workTime = WorkTime::query()
            ->orderBy('id', 'desc')
            ->where('user_id', $request->user()->id)
            ->whereNull('end_time')
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (!$workTime) {
            return $this->josnResponse(false, __('api.work_time_not_started'), Response::HTTP_OK);
        }

        $startTime = Carbon::parse($workTime->start_time);
        $workTime->update([
            'end_lat' => $request->end_lat,
            'total_time' => $startTime->diffInSeconds(Carbon::now()),
            'end_long' => $request->end_long,
            'end_time' => Carbon::now()
        ]);

        return $this->josnResponse(true, __('api.user_work_ended') . " [" .  gmdate("H:i:s", $workTime->total_time) . "]", Response::HTTP_OK);
    }
}
