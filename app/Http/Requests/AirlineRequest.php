<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirlineRequest extends FormRequest
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
            $checkUnique = "unique:airlines,name";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            $checkUnique = 'unique:airlines,name,' . $this->airline->id;
        }

        return [
            "name" => ['required', $checkUnique],
            "code" => ['required',],
        ];
    }
}
