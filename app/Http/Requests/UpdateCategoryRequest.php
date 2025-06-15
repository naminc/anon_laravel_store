<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCategoryRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255|unique:categories,name,' . $this->category_id,
            'description' => 'nullable|string|max:1000',
            'icon'        => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category ID is required',
            'category_id.exists' => 'Category ID is not valid',
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must be less than 255 characters',
            'name.unique' => 'Name already exists',
            'description.string' => 'Description must be a string',
            'description.max' => 'Description must be less than 1000 characters',
            'icon.image' => 'Icon must be an image',
            'icon.mimes' => 'Icon must be in jpg, jpeg, png, or svg format',
            'icon.max' => 'Icon must be less than 2MB',
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
