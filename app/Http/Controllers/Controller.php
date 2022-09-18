<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //set defeult pagination limation
    protected const ITEM_PER_PAGE = 20;

    //return custome response
    protected function josnResponse($result = true, $message = "", $code = 200, $data = null, $error = null)
    {
        $reponse = [
            'result' => $result,
            'status' => $code,
            'message' => $message,
        ];

        if ($data !== null || is_array($data)) {
            $reponse['data'] = $data;
        }

        if ($error) {
            $reponse['errors'] = $error;
        }

        return response()->json($reponse, $code);
    }
}
