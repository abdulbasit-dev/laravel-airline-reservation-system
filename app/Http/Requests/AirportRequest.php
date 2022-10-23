<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportRequest extends FormRequest
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

        if (request()->isMethod("POST")) {
            $checkUnique = "unique:airports,name";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            $checkUnique = 'unique:airports,name,' . $this->airport->id;
        }

        return [
            "name" => ['required', $checkUnique],
            "city_id" => ['required', 'exists:cities,id'],
        ];
    }
}
