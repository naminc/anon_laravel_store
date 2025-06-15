<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoryRequest extends FormRequest
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
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
            'icon'        => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'name.unique' => 'Name already exists',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 1000 characters',
            'icon.required' => 'Icon is required',
            'icon.image' => 'Icon must be an image',
            'icon.mimes' => 'Icon must be in jpg, jpeg, png, or svg format',
            'icon.max' => 'Icon must be less than 2MB',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        session()->flash('form_error', 'add');
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}
