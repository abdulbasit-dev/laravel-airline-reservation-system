<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\CarExpense;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarExpenseCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("carExpense_view");

        $carExpenses = CarExpense::query()
            ->select(["id", 'user_id', "title", "description", "price", "created_at"])
            ->where('user_id', auth()->user()->id)->get();

        return new CarExpenseCollection($carExpenses);
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
        $this->authorize("carExpense_add");

        try {
            //validation
            $validator = Validator::make($request->all(), [
                "car_id" => ['required', 'exists:cars,id'],
                "image" => ['required', 'file', 'mimes:png,jpg,jpeg'],
                "title" => ['required'],
                "description" => ['required'],
                "price" => ['required'],
            ]);

            if ($validator->fails()) {
                return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
            }

            $carExpense = CarExpense::create([
                "user_id" => $request->user()->id,
                "car_id" => $request->car_id,
                "title" => $request->title,
                "description" => $request->description,
                "price" => $request->price,
            ]);

            // save car expance image 
            $carExpense->addMediaFromRequest('image')->usingName($request->title)->toMediaCollection();

            return $this->josnResponse(true, __('api.create_resource', ['resource' => __('attributes.car_expense')]), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->josnResponse(false, __('api.internal_server_error'), Response::HTTP_INTERNAL_SERVER_ERROR, null, $e->getMessage());
        }
    }
}
