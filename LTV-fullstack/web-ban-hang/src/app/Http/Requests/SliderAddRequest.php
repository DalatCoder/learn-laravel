<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders|max:255|min:5',
            'description' => 'required',
            'image' => 'required'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên slider không được bỏ trống',
            'name.unique' => 'Slider với cùng tên đã tồn tại, vui lòng chọn tên khác',
            'name.max' => 'Tên slider không vượt quá 255 kí tự',
            'name.min' => 'Tên slider không được ít hơn 5 kí tự',
            'description.required' => 'Mô tả slider không được để trống',
            'image.required' => 'Ảnh minh họa slider không được để trống'
        ];
    }
}
