<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => 'bail|required|email|max:255',
            'password' => 'required',
            'role_id' => 'bail|required|exists:roles,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng không được để trống',
            'name.max' => 'Tên người dùng không được vượt quá 255 kí tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'email.max' => 'Email không được vượt quá 255 kí tự',
            'password.required' => 'Password không được bỏ trống',
            'role_id.required' => 'Nhóm người dùng không được bỏ trống',
            'role_id.exists' => 'Nhóm người dùng không hợp lệ, vui lòng chọn lại'
        ];
    }
}
