<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Visit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("visit_view");

        $visits = Visit::where('user_id',auth()->user()->id)->get();
        
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.visit')]), Response::HTTP_OK, $visits);
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
        $this->authorize("visit_add");

        //validation
        $validator = Validator::make($request->all(),[
            "user_id"=>['required', 'numeric'],
            "client_id"=>['required', 'numeric'],
            "text"=>['required','string'],
            "lat" => ['required', 'numeric', 'min:-90', 'max:90'],
            "long" => ['required', 'numeric', 'min:-180', 'max:180'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        Visit::create([
           "user_id"=>$request->user_id,
           "client_id"=>$request->client_id,
           "text"=>$request->text,
           "lat"=>$request->lat,
           "long"=>$request->long,
        ]);


        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.visit')]), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        //check permission
        $this->authorize("visit_view");
        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.visit')]), Response::HTTP_OK, $visit);
    }

}