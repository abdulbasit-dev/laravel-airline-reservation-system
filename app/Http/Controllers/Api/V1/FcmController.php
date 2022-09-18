<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Notifications\FcmNotification;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class FcmController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //check permission
        $this->authorize("update_fcm");
        
        //validation
        $validator = Validator::make($request->all(), [
            "fcm_token" => ['required', 'string'],
        ]);

        if ($validator->fails()) {

            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }
        
        auth()->user()->update(["fcm_token"=> $request->fcm_token]);

        return $this->josnResponse(true, __('api.update_resource', ['resource' => __('attributes.fcm_token')]), Response::HTTP_OK);

    }
}
