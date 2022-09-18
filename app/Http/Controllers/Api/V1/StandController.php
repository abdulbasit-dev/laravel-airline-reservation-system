<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Stand;
use App\Http\Controllers\Controller;
use App\Http\Resources\StandCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class StandController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("stand_view");

        $stands = Stand::where('user_id',auth()->user()->id)->get();
        
        return new StandCollection($stands);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("stand_add");

        //validation
        $validator = Validator::make($request->all(),[
            "client_id"=>['required', 'numeric'],
            "text"=>['required','string'],
            "lat" => ['required', 'numeric', 'min:-90', 'max:90'],
            "long" => ['required', 'numeric', 'min:-180', 'max:180'],
            "image"=>['required','file', 'mimes:png,jpg,jpeg'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        $stand = Stand::create([
           "user_id"=>auth()->id(),
           "client_id"=>$request->client_id,
           "text"=>$request->text,
           "lat"=>$request->lat,
           "long"=>$request->long,
        ]);

        // save car expance image 
        $stand->addMediaFromRequest('image')->usingName(now())->toMediaCollection();

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.stand')]), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stand  $stand
     * @return \Illuminate\Http\Response
     */
    public function show(Stand $stand)
    {
        //check permission
        $this->authorize("stand_view");

        // $stand->image=getfile($stand);

        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.stand')]), Response::HTTP_OK, array_merge($stand->toArray(),["image"=>getfile($stand)]));
        // return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.stand')]), Response::HTTP_OK,$stand);
    }
}