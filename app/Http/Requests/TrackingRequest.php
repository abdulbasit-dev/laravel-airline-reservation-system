<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrackingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "locations" => ['required', 'array'],
            "locations.*.lat" => ['required', 'numeric', 'min:-90', 'max:90'],
            "locations.*.lng" => ['required', 'numeric', 'min:-180', 'max:180'],
            "locations.*.time" => ['required', 'date'],
        ];
    }
}
