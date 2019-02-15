<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
            'catname' => 'required',
            'slugname' => 'required'
        ];
    }

    public function message(){
        return [
            'catname.required' => 'Category name is required',
            'slugname.requied' => 'Category slug name is required'
        ];
    }
}
