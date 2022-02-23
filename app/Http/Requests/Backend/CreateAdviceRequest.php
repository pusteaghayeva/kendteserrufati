<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdviceRequest extends FormRequest
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
            'title' => 'required|max:191',
            'content' =>'required',
            'file' => 'max:2000|mimes:jpeg,png,doc,docs,pdf',
            'image' => 'mimes:png,jpg',
            'status' => 'required|in:0,1',
            'categories'=> 'required|exists:categories,id',

        ];
    }
}
