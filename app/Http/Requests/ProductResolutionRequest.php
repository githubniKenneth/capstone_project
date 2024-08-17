<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductResolutionRequest extends FormRequest
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
            // column name => unique:table_name,id gumana na?
            "resolution_desc" => ['required','unique:product_resolutions,resolution_desc'],
            // "group_code" => ['required','unique:groups,id'],
            // "group_icon" => ['required']
            
        ];
    }
    public function messages()
    {
        return [
            // column_name.rule => message
            'resolution_desc.required' => 'Resolution Description is required!',
            'resolution_desc.unique' => 'Resolution Description must be unique!',
            // 'group_code.required' => 'Group Code is required!',
            // 'group_code.unique' => 'Group Code must be unique!',
            // 'group_icon.required' => 'Group Icon is required!',
        
        ];
    }
}
