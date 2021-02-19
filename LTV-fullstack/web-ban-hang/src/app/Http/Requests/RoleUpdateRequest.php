<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
            'name' => 'bail|required|max:255',
            'display_name' => 'bail|required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên nhóm người dùng không được để trống',
            'name.max' => 'Tên nhóm người dùng không được vượt quá 255 kí tự',
            'display_name.required' => 'Mô tả nhóm người dùng không được để trống',
            'display_name.max' => 'Mô tả nhóm người dùng không được nhiều hơn 255 kí tự'
        ];
    }
}

