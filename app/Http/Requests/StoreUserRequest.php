<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fullname' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,user',
            'status'   => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'FullName is required',
            'fullname.string' => 'FullName must be a string',
            'fullname.max' => 'FullName must be less than 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'role.required' => 'Role is required',
            'role.in' => 'Role must be either admin or user',
            'status.required' => 'Status is required',
            'status.in' => 'Status must be either active or inactive',
        ];
    }
}
