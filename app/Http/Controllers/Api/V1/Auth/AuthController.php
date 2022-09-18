<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false, __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        $credentials = $request->all();
        //check email
        $user = User::where('email', $credentials['email'])->get()->first();

        //check password
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return $this->josnResponse(false, __('auth.failed'), Response::HTTP_UNAUTHORIZED);
        }

        //create token
        $token = $user->createToken('myapitoken')->plainTextToken;
        $user["user_token"] = $token;
        //get user role
        $user["user_role"] = $user->getRoleNames()[0] ?? null;

        return $this->josnResponse(true, __('api.login_success'), Response::HTTP_OK, $user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->josnResponse(true, __('api.logout_success'), Response::HTTP_OK);
    }
}
