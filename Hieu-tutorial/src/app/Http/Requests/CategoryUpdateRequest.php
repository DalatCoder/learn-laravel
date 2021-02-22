<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục không được phép để trống',
            'category_desc.required' => 'Mô tả danh mục không được phép để trống',
            'category_status.required' => 'Trạng thái danh mục không được phép để trống',
        ];
    }
}
