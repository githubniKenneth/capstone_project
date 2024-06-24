<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserStoreRequest extends FormRequest
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
        $userId = $this->route('id');
        return [
            
                        
            "username" => ['required', 
                        Rule::unique('users')->ignore($userId),],
            "email" => ['required','email'], 
            "password" => ['exclude_if:password,null', 'nullable', 'required', 'confirmed'], 
            "password_confirmation" => ['exclude_if:password_confirmation,null', 'nullable', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required!',
            'username.unique' => 'Username already exist!',
            'emp_id.unique' => 'Employee has existing account!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'password_confirmation.required' => 'Password Confirmation is required!',
            'password.confirm' => 'The password confirmation does not match!',
        ];
    }
}
