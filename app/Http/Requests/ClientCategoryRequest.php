<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Log;
use Request;

class ClientCategoryRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if (request()->isMethod("POST")) {
            $checkUnique = "unique:client_categories,name";
        } elseif (request()->isMethod("PUT") || request()->isMethod("PATCH")) {
            // $checkUnique =  Rule::unique('client_categories')->ignore($this->id);
            // $checkUnique =  'unique:client_categories,name,' . $request->get('name');
            // Log::info($this->/);
            $checkUnique =  '';
        }

        return [
            'name' => ['required', $checkUnique],
        ];
    }
}
