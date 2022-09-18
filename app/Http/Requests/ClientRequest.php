<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            "category" => ['required', 'exists:client_categories,id'],
            "name" => ['required', 'string'],
            "phone" => ['required'],
            "address" => ['required'],
            "loan_limit" => ['required', 'integer'],
            'zone' => ['exists:zones,id'],
        ];
    }
}
