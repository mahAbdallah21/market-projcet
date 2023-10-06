<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


            "name_ar"=>'required|string|max:130',
            "name_en"=>'required|string|max:120',
            "price" =>"required |numeric",
            'quantity'=>'required|numeric',
            "image" => 'image',
            'description_ar' => 'required',
            'description_en' => 'required',

        ];
    }
}
