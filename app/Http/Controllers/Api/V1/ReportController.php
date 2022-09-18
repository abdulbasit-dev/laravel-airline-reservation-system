<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientVisitCollection;
use App\Http\Resources\OrderCollection;
use App\Traits\UserOrderTrait;
use App\Models\CarExpense;
use App\Models\Order;
use App\Models\ReturnProduct;
use App\Models\User;
use App\Models\Visit;
use App\Models\WorkTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use UserOrderTrait;
    public function summary(Request $request)
    {
        $userId = auth()->id();

        //working hours
        $workingHours = WorkTime::query()
            ->where('user_id', $userId)
            ->whereNotNull('end_time')
            ->whereDate('created_at', Carbon::today())
            ->sum('total_time');

        $data  = [
            "today_order" => $this->todayOrderQuery()->count(),
            "client_visit" => Visit::where('user_id', $userId)->whereDate('created_at', today())->count(),
            "car_expenses" => CarExpense::where('user_id', $userId)->count(),
            "item_returns" => ReturnProduct::where('user_id', $userId)->count(),
            "working_hours" => date('H:i:s', $workingHours),
        ];

        return $this->josnResponse(true, __('api.report_summary'), Response::HTTP_OK, $data);
    }

    public function todayOrder()
    {
        return new OrderCollection($this->todayOrderQuery()->get());
    }

    public function clientVisits(Request $request)
    {
        $query = Visit::query()
            ->where('user_id', auth()->id())
            ->whereDate('created_at', today());

        if ($request->count == true) {
            $data["total"] = $query->count();
            return $this->josnResponse(true, __('api.client_visit'), Response::HTTP_OK, $data);
        }

        return new ClientVisitCollection($query->get());
    }

    public function returnProducts(Request $request)
    {

        if ($request->count == true) {
            // $data["total"] = $query->count();
            $data["total"] = "not implemented";
            return $this->josnResponse(true, __('api.return_product'), Response::HTTP_OK, $data);
        }

        return "not implemented";
    }

    protected function todayOrderQuery()
    {
        $userRoleName =  auth()->user()->getRoleNames()[0];
        $query = null;
        if ($userRoleName == 'sale-representative') {
            $query = $this->userOrder()
                ->whereDate('created_at', today());
        } else {
            $query = $this->userOrder()
                ->where("is_delivered", '==', 0);
        }

        return $query;
    }
}
