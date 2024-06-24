<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            "branch_id" => ['required'], 
            "empr_id" => ['required'],
            "emp_first_name" => ['required'],
            "emp_last_name" => ['required'],
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
            'branch_id.required' => 'Branch Employed is required!',
            'empr_id.required' => 'Employee Role is required!',
            'emp_first_name.required' => 'First Name is required!',
            'emp_last_name.required' => 'Last Name is required!',
            'emp_street.required' => 'Barangay is required!',
            'emp_brgy.required' => 'First Name is required!',
            'emp_city.required' => 'City is required!',
            "emp_phone_no.required" => 'Cellphone No. is required!',
            "emp_email.required" => 'Email is required!',
            "emp_email.email" => 'Invalid Email',
        ];
    }
}
