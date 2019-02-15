<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Tags extends FormRequest
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
            'tagname' => 'required',
            'slugname' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tahgname.required' => 'Tag name Required!',
            'slugname.required' => 'Slug name is required!'
        ];
    }
}
