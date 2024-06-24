<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchStoreRequest extends FormRequest
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
            "branch_name" => ['required'], 
            "branch_brgy" => ['required'],
            "branch_city" => ['required'],
            "branch_tele_no" => ['required'],
            "branch_phone_no" => ['required'],
            "branch_email" => ['required','email'], //rule unique params (table name, column name)
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'branch_name.required' => 'Branch Name is required!',
            "branch_brgy.required" => 'Barangay is required!',
            "branch_city.required" => 'City is required!',
            "branch_tele_no.required" => 'Telephone No. is required!',
            "branch_phone_no.required" => 'Cellphone No. is required!',
            "branch_email.required" => 'Email is required!',
            "branch_email.email" => 'Invalid Email',
        ];
    }
}
