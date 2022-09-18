<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "amount_paid"=>["required","numeric"],
            "date"=>["required","date"],
            "safe_id"=>["required","exists:safes,id"], 
            "exchange_type"=>["required","in:USD,IQD"], 
        ];
    }
}
