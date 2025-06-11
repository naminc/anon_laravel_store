<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreProductRequest extends FormRequest
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
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'images'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category is required',
            'category_id.exists'   => 'Category not found',
            'name.required'        => 'Name is required',
            'name.string'          => 'Name must be a string',
            'name.max'             => 'Name must be less than 255 characters',
            'price.required'       => 'Price is required',
            'price.numeric'        => 'Price must be a number',
            'price.min'            => 'Price must be greater than 0',
            'images.required'      => 'Images are required',
            'images.image'         => 'Images must be an image',
            'images.mimes'         => 'Images must be in jpg, jpeg, or png format',
            'images.max'           => 'Images must be less than 2MB',
            'description.string'   => 'Description must be a string',
            'status.required'      => 'Status is required',
            'status.in'            => 'Status must be active or inactive',
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
