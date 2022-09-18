<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function key()
    {
        $settings = Setting::pluck('key');
        return $this->josnResponse(true, __('api.settings_key'), Response::HTTP_OK, $settings);
    }

    public function getValue(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            "key" => ['required', 'exists:settings,key'],
        ]);

        if ($validator->fails()) {
            return $this->josnResponse(false,  __('api.invalid_inputs'), Response::HTTP_UNPROCESSABLE_ENTITY, null, $validator->errors()->all());
        }

        $setting = Setting::query()
            ->select('key', 'value')
            ->where('key', $request->key)
            ->first();
            
        return $this->josnResponse(true, __('api.settings_value'), Response::HTTP_OK, $setting);
    }
}
