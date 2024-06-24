<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleStoreRequest extends FormRequest
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
            "module_name" => ['required'], 
            "group_id" => ['required'],
            "module_code" => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'module_name.required' => 'Module Name is required!',
            'group_id.required' => 'Group Name is required!',
            'module_code.required' => 'Module Code is required!',

        ];
    }
}
