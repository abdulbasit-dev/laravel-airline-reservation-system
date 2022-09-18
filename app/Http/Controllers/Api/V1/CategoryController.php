<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories  = Category::pluck('name', 'id')->toArray();
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.category')]), Response::HTTP_OK, $categories);
    }
}
