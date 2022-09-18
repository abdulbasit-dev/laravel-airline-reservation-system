<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            $checkUnique = "unique:coupons,code";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            $checkUnique =  'unique:coupons,code,' . $this->code->id;
        }

        return [
            'code'              => ['required', $checkUnique],
            // 'type'              => ['required', Rule::in(['product_base', 'cart_base'])],
            'discount_type'     => ['required', Rule::in(['percentage', 'amount'])],
            'discount'          => ['required'],
            'start_date'        => ['sometimes', 'date'],
            'end_date'          => ['sometimes', 'date']
        ];
    }
}
