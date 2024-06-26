<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupStoreRequest extends FormRequest
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
            "group_name" => ['required','unique:groups,id'], 
            "group_code" => ['required','unique:groups,id'],
            "group_icon" => ['required']
            
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => 'Group Name is required!',
            'group_name.unique' => 'Group Name must be unique!',
            'group_code.required' => 'Group Code is required!',
            'group_code.unique' => 'Group Code must be unique!',
            'group_icon.required' => 'Group Icon is required!',
            
        ];
    }
}
