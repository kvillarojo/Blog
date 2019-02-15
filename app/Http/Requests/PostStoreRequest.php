<?php

namespace App\Http\Requests;
use Response;
use Illuminate\Foundation\Http\FormRequest;


class PostStoreRequest extends FormRequest
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
            'title' => 'required',
            'sub-title' => 'required',
            'slug' => 'required',
            'post' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post title is required!',
            'sub-title.required' => 'Post Sub title is required!',
            'slug.required' => 'Post slug is required!',
            'post.required' => 'Post description is required!'
        ];
    }
}
