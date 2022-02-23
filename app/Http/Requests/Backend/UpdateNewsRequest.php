<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            //
            'category_id'=> 'required|exists:categories,id',
            'image' => 'mimes:png,jpg',
            // 'gallery_id' => 'required|exists:photo_galleries,id',
            'content'=> 'required',
            'status' => 'required|in:0,1',
        ];
    }
}
