<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'airline_id'        => ['required', 'exists:airlines,id'],
            'plane_id'        => ['required', 'exists:planes,id'],
            'origin_id'        => ['required', 'exists:airports,id'],
            'destination_id'        => ['required', 'exists:airports,id'],
            'departure'        => ['required'],
            'arrival'        => ['required'],
            'price'        => ['required']
        ];
    }
}
