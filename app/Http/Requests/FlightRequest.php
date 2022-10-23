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
        if (request()->isMethod("POST")) {
            $checkUnique = "unique:planes,name";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            $checkUnique = 'unique:planes,name,' . $this->plane->id;
        }

        return [
            "name"              => ['required', $checkUnique],
            "code"              => ['required'],
            'capacity'          => ['required'],
            'airline_id'        => ['required', 'exists:airlines,id']
        ];
    }
}
