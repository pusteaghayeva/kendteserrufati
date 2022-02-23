<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAqrarnewsRequest extends FormRequest
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
            'category_id'=> 'required',
            'title' => 'required|max:191',
            'image' => 'mimes:png,jpg',
            'file' => 'max:2000|mimes:jpeg,png,doc,docs,pdf',
            'content'=> 'required',
            'status' => 'required|in:0,1',
        ];
    }
}
