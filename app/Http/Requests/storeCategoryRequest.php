<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryRequest extends FormRequest
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
            'name'=>'required',
             'image'=>'required|image',
             'category_id'=>'required' ,
             'is_showing' =>'required',
              'is_popular'=>'required',
              'meta_title'=>'required',
               'meta_description'=>'required',
            'mate_keywords'=>'required',
        ];
    }
}