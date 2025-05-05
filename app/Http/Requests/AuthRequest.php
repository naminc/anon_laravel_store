<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:6|max:255',
            'password' => 'required|string|min:6',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'password.required' => 'Mật khẩu không được để trống.',
            'username.min' => 'Tên đăng nhập phải có ít nhất 6 ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'username.max' => 'Tên đăng nhập không được vượt quá 255 ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',
            'password.confirmed' => 'Mật khẩu không khớp.',
        ];
    }
}
