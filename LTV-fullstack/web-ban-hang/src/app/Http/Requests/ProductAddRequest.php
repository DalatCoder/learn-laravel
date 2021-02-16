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
            'content' => 'required'
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
            'name.required' => 'Vui lòng nhập tên cho sản phẩm',
            'name.unique' => 'Sản phẩm cùng tên đã tồn tại, vui lòng chọn tên khác',
            'name.max' => 'Tên sản phẩm quá dài',
            'name.min' => 'Tên sản phẩm quá ngắn',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm',
            'price.integer' => 'Vui lòng nhập giá sản phẩm hợp lệ',
            'category_id.required' => 'Vui lòng cho biết sản phẩm thuộc nhóm nào',
            'category_id.integer' => 'Nhóm sản phẩm không hợp lệ',
            'category_id.exists:categories,id' => 'Nhóm sản phẩm không hợp lệ',
            'content.required' => 'Vui lòng nhập mô tả cho sản phẩm'
        ];
    }
}
