<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'fullname' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email field is required.',
            'email.email' => 'Email is not valid.',
            'email.unique' => 'Email already exists.',
            'fullname.required' => 'Fullname field is required.',
            'fullname.string' => 'Fullname is not valid.',
            'fullname.max' => 'Fullname must be less than 255 characters.',
            'password.required' => 'Password field is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password and confirm password must be the same.',
            'password_confirmation.required' => 'Password confirmation field is required.',
            'password_confirmation.same' => 'Password and confirm password must be the same.',
        ];
    }
}