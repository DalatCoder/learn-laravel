<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandUpdateRequest extends FormRequest
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
            'brand_name' => 'required',
            'brand_desc' => 'required',
            'brand_status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Tên thương hiệu không được phép để trống',
            'brand_desc.required' => 'Mô tả thương hiệu không được phép để trống',
            'brand_status.required' => 'Trạng thái thương hiệu không được phép để trống',
        ];
    }
}
