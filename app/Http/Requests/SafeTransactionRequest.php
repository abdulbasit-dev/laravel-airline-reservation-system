<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SafeTransactionRequest extends FormRequest
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
            "type"=>["required","in:deposit,withdraw"],
            "transaction_by"=>["required","exists:users,id"],
            "amount"=>["required","numeric","gt:0"],
            "date"=>["required","date"],
            "note"=>["required","string","nullable"],
        ];
    }
}
