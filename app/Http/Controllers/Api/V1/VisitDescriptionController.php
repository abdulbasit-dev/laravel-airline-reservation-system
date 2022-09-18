<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VisitDescription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class VisitDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check permission
        $this->authorize("visitDescription_view");

        $visits = VisitDescription::all();
        
        return $this->josnResponse(true, __('api.all_resource', ['resource' => __('attributes.visit')]), Response::HTTP_OK, $visits);
    }

}