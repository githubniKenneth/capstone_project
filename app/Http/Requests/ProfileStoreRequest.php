<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            "password" => ['exclude_if:password,null', 'nullable', 'required', 'confirmed'], 
            "password_confirmation" => ['exclude_if:password_confirmation,null', 'nullable', 'required'],
            "emp_street" => ['required'],
            "emp_brgy" => ['required'], //rule unique params (table name, column name)
            "emp_city" => ['required'],
            "emp_phone_no" => ['required'],
            "emp_email" => ['required','email'],
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password is required!',
            'password_confirmation.required' => 'Password Confirmation is required!',
            'password.confirm' => 'The password confirmation does not match!',
            'emp_street.required' => 'Barangay is required!',
            'emp_brgy.required' => 'First Name is required!',
            'emp_city.required' => 'City is required!',
            "emp_phone_no.required" => 'Cellphone No. is required!',
            "emp_email.required" => 'Email is required!',
            "emp_email.email" => 'Invalid Email',
        ];
    }
}
