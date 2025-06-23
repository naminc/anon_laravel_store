<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'required|string|max:15',
            'address'    => 'required|string|max:255',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:100',
            'zip'        => 'required|string|size:5',
            'country'    => 'required|string|max:50',
            'payment_method' => 'required|in:pay_on_delivery',
            'note'         => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
            'city.required' => 'City is required',
            'state.required' => 'State is required',
            'zip.required' => 'Zip is required',
            'country.required' => 'Country is required',
            'payment_method.required' => 'Payment method is required',
            'payment_method.in' => 'Invalid payment method',
            'zip.size' => 'Zip must be 5 digits',
            'email.email' => 'Invalid email address',
            'phone.string' => 'Phone must be a string',
            'phone.max' => 'Phone must be less than 15 characters',
            'address.max' => 'Address must be less than 255 characters',
            'city.max' => 'City must be less than 100 characters',
            'state.max' => 'State must be less than 100 characters',
            'country.max' => 'Country must be less than 50 characters',
            'zip.size' => 'Zip must be 5 digits',
            'email.email' => 'Invalid email address',
            'first_name.string' => 'First name must be a string',
            'last_name.string' => 'Last name must be a string',
            'address.string' => 'Address must be a string',
            'city.string' => 'City must be a string',
            'state.string' => 'State must be a string',
            'country.string' => 'Country must be a string',
            'zip.string' => 'Zip must be a string',
            'note.string' => 'Note must be a string',
            'note.max' => 'Note must be less than 255 characters',
        ];
    }
}
