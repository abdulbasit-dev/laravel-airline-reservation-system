<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $suppliers  = Supplier::pluck('name', 'id')->toArray();
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.supplier')]), Response::HTTP_OK, $suppliers);
    }
}
