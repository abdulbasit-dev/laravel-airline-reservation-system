<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class NewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(1);
        //check permission
        $this->authorize("driver_view_order");

        
        $orders = Order::where("pickedup_by",auth()->user()->id)
                        ->where("is_canceled",0)
                        ->where("is_delivered",0)
                        ->where("is_assigned",1)
                        ->get();
        
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.order')]), Response::HTTP_OK, $orders);
    }
}