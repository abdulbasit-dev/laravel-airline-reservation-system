<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseDetailRequest extends FormRequest
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
            "supplier_id" => ["required", "exists:suppliers,id"],
            "exchange_type" => ['required', "exists:safes,id"],
            "amount_paid"=>["sometimes","numeric","nullable"],
            "safe_id" => ["sometimes", "exists:safes,id"],
            "date"=>["required","date"],
            "exchange_type"=>["required","in:USD,IQD"], 
            "note"=>["sometimes","string"],
            "id"=>["required","array"],
            "price"=>["required","array"],
            "quantity"=>["required","array"],
            "totalarray"=>["required","array"],
            // "products.*.product_id"=>["required","exists:products,id"], 
            // "products.*.product_price"=>["required","exists:products,id"], 
            // "products.*.quantity"=>["required","exists:products,id"], 
            // "products.*.total_price"=>["required","exists:products,id"], 
            // "products.*.total_price"=>["required","exists:products,id"], 
        ];
    }
}
