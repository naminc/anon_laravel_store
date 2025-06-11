<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->input('user_id');
        return [
            'user_id' => 'required|exists:users,id',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,user',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'User ID is not valid',
            'fullname.required' => 'Fullname is required',
            'fullname.string' => 'Fullname is not valid',
            'fullname.max' => 'Fullname must be less than 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.unique' => 'Email already exists',
            'password.string' => 'Password is not valid',
            'password.min' => 'Password must be at least 6 characters',
            'role.required' => 'Role is required',
            'role.in' => 'Role must be either admin or user',
            'status.required' => 'Status is required',
            'status.in' => 'Status must be either active or inactive',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session()->flash('form_error', 'update');
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}