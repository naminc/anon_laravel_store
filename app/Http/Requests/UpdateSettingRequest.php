<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'title'             => 'nullable|string|max:255',
            'keyword'           => 'nullable|string|max:1000',
            'description'       => 'nullable|string|max:1000',
            'logo'              => 'nullable|string|max:255',
            'icon'              => 'nullable|string|max:255',
            'author'            => 'nullable|string|max:255',
            'domain'            => 'nullable|string|max:255',
            'phone'             => 'nullable|string|max:20',
            'email'             => 'nullable|email|max:255',
            'address'           => 'nullable|string|max:500',
            'maintenance_mode'  => 'nullable|in:on,off',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Title must be a string',
            'title.max' => 'Title must be less than 255 characters',
            'keyword.string' => 'Keyword must be a string',
            'keyword.max' => 'Keyword must be less than 1000 characters',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 1000 characters',
            'logo.string' => 'Logo must be a string',
            'logo.max' => 'Logo must be less than 255 characters',
            'icon.string' => 'Icon must be a string',
            'icon.max' => 'Icon must be less than 255 characters',
            'author.string' => 'Author must be a string',
            'author.max' => 'Author must be less than 255 characters',
            'domain.string' => 'Domain must be a string',
            'domain.max' => 'Domain must be less than 255 characters',
            'phone.string' => 'Phone must be a string',
            'phone.max' => 'Phone must be less than 20 characters',
            'email.email' => 'Email is not valid',
            'email.max' => 'Email must be less than 255 characters',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be less than 500 characters',
            'maintenance_mode.required' => 'Maintenance mode is required',
            'maintenance_mode.in' => 'Maintenance mode must be either on or off',
        ];
    }
}
