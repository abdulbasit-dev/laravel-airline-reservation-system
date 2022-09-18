<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TrackingFilterRequest;

class TrackingController extends Controller
{
    public function live()
    {
        //check permission
        $this->authorize("tracking_live_view");
        
        $locations = Storage::get("locations/lastest.json");
        return view('tracking.live',["locations"=>$locations,"users" => User::isTrackable()]);
    }
    public function history()
    {
        //check permission
        $this->authorize("tracking_history_view");
    
        return view('tracking.history', ["users" => User::isTrackable()]);
    }
    public function filter(TrackingFilterRequest $request)
    {
        //check permission
        $this->authorize("tracking_history_view");

        $request->id;
        //start = startdate
        if ($request->has('date')) {
            $date = new DateTime($request->date); 

            $LoadData= json_decode(Storage::get('locations/' . $request->id . '/' . $date->format('Y-m-d') . '.json'));

            return $LoadData;
        }
        $LoadData = json_decode(Storage::get('locations/' . $request->id . '/' . date("Y-m-d") . '.json'));
        return  $LoadData;
    }
    
}
