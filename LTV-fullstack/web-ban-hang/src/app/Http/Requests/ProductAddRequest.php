<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'bail|required|integer',
            'category_id' => 'bail|required|integer|exists:categories,id',
            'description' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Sản phẩm cùng tên đã tồn tại, vui lòng chọn tên khác',
            'name.max' => 'Tên sản phẩm không được dài hơn 255 kí tự',
            'name.min' => 'Tên sản phẩm không được ít hơn 5 kí tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'price.integer' => 'Giá sản phẩm không hợp lệ',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
            'category_id.integer' => 'Nhóm sản phẩm không hợp lệ',
            'category_id.exists' => 'Nhóm sản phẩm không tồn tại',
            'description.required' => 'Mô tả sản phẩm không được để trống'
        ];
    }
}
