<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            "client_mobile_no" => ['required'], 
            "client_email" => ['required'],
            "client_full_name" => ['unique:groups,id'],
        ];
    }

    public function messages()
    {
        return [
            'client_full_name.unique' => 'Name already exist!',
            'client_mobile_no.required' => 'Mobile Number is required!',
            'client_email.required' => 'Email is required!',
        ];
    }
}
