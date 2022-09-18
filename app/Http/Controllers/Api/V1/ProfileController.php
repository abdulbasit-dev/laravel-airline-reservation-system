<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return $this->josnResponse(true, __('api.user_profile'), Response::HTTP_OK, auth()->user());
    }

    public function update(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            "name" => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        return $this->josnResponse(true, __('api.profile_updated'), Response::HTTP_OK, $user);
    }
}
