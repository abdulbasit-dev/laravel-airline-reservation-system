<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("client_view");

        $clients = Client::orderByDesc('created_at')->with('category:id,name')->get();
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.client')]), Response::HTTP_OK, $clients);
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
        $this->authorize("client_add");

        //validation
        $validator = Validator::make($request->all(), [
            "category_id" => ['required', 'exists:client_categories,id'],
            "name" => ['required', 'string'],
            "phone" => ['required', 'string', 'unique:clients,phone'],
            "phone_alt" => ['sometimes', 'required', 'unique:clients,phone_alt'],
            "address" => ['required', 'string'],
            "lat" => ['required'],
            "long" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        //get validated data
        $validated = $validator->validated();

        $client = Client::create($validated);

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.client')]), Response::HTTP_CREATED, $client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Client $client, Request $request)
    {
        //check permission
        $this->authorize("client_edit");

        //validation
        $validator = Validator::make($request->all(), [
            "category_id" => ['required', 'exists:client_categories,id'],
            "name" => ['required', 'string'],
            "phone" => ['required', 'string'],
            "phone_alt" => ['sometimes', 'required'],
            "address" => ['required', 'string'],
            "lat" => ['required'],
            "long" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        //get validated data
        $validated = $validator->validated();

        $client->update($validated);

        return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.client')]), Response::HTTP_CREATED, $client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //check permission
        $this->authorize("client_view");

        $client->load('category:id,name');
        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.client')]), Response::HTTP_OK, $client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //check permission
        $this->authorize("client_view");

        //validation
        $validator = Validator::make($request->all(), [
            "search" => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        $clients = Client::where('name', 'LIKE', '%' . $request->search . '%')->get();

        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.client')]), Response::HTTP_OK, $clients);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function paymentHistory(Client $client)
    {
        //check permission
        $this->authorize("client_payment_view");
        $client->total_payment = formatPrice($client->paymentHistory()->sum('paid'));

        $client->load('paymentHistory');
        return $this->josnResponse(true, __('api.show_resource_info', ['resource' => __('attributes.client')]), Response::HTTP_OK, $client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function dues(Client $client)
    {
        //check permission
        $this->authorize("client_payment_view");

        $client->total_dues = formatPrice($client->dues()->sum('due'));
        $client->load('dues');
        return $this->josnResponse(true, __('api.client_dues'), Response::HTTP_OK, $client);
    }
}
