<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check permission
        $this->authorize("contact_add");

        //validation
        $validator = Validator::make($request->all(), [
            "subject" => ['required'],
            "note" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }
        $validated = $validator->validated();
        Contact::create($validated + ['user_id' => auth()->id()]);

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.contact')]), Response::HTTP_CREATED);
    }
}
