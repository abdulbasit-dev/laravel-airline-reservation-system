<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $barnds  = Brand::pluck('name', 'id')->toArray();
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.brand')]), Response::HTTP_OK, $barnds);
    }
}
