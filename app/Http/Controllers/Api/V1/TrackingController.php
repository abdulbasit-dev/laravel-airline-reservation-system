<?php

namespace App\Http\Controllers\Api\V1;

use Arr;

use Illuminate\Http\Response;
use App\Events\UpdateLocation;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrackingRequest;
use Illuminate\Support\Facades\Storage;

class TrackingController extends Controller
{
    public function update(TrackingRequest $request)
    {

        //check permission
        $this->authorize("tracking_add");

        //preparing ws Data
        $last = last($request->locations);
        $last['id'] = auth()->user()->id;

        //sending WS
        UpdateLocation::dispatch($last);
        
        
        $this->UpdateLatestFile("locations/lastest.json",$last);
        
        
        $fileName = 'locations/' . $last['id'] . '/' . date("Y-m-d") . '.json';
        
        $this->UpdateFile($fileName,$request->locations);
        


        return $this->josnResponse(true, __('api.Tracking_update_success'), Response::HTTP_OK);
    }
    protected function UpdateFile($fileName,$newData){
        $LoadData = json_decode(Storage::get($fileName));

        $NewData = array_merge($LoadData ? $LoadData : [], $newData);

        Storage::put($fileName, json_encode($NewData));
    }

    protected function UpdateLatestFile($fileName,$newData){
        $LoadData = (array) json_decode(Storage::get($fileName));

        $LoadData[$newData['id']] = $newData;
        
        
        Storage::put($fileName, json_encode($LoadData));
        // // return print_r($LoadData);
    }

}
