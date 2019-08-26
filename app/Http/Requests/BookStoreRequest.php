<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'author' => 'required|min:1',
            'name' => 'required|min:1',
            'count' => 'required|min:1',
            'short_description'=> 'required|min:3',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
