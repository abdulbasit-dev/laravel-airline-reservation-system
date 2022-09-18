<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            $checkUnique = "unique:cars,plate_number";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            $checkUnique = 'unique:cars,plate_number,' . $this->car->id;
        }

        return [
            "plate_number" => ['required', $checkUnique],
            "driver" => ['required', 'exists:users,id'],
            "model" => ['required'],
        ];
    }
}
