<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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
            'title'=>'required|min:3|unique:tbl_pages,title',
            'image'=>'required|mimes:jpg,jpeg,png,bmp,tiff|image|max:4096',
            'category_id'=>'required|exists:tbl_categories,id',
            'brief'=>'required',
            'content'=>'required',
        ];
    }
}
