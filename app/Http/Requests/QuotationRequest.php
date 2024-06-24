<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
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
            // "quote_number" => ['unique:sales_quotations,id'],

            "quote_name" => ['required'],
            "quote_email" => ['required'],
            "quote_contact_no" => ['required'],
            "quote_address" => ['required'],
            "brand_id" => ['required'],
            "resolution_desc" => ['required'],
            "channel_id" => ['required'],
            "indoor_cam_no" => ['required'],
            "outdoor_cam_no" => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'quote_name.required' => 'Name is required!',
            'quote_email.required' => 'Email is required!',
            'quote_contact_no.required' => 'Contact Number is required!',
            'quote_address.required' => 'Address is required!',
            'brand_id.required' => 'Brand is required!',
            'resolution_desc.required' => 'Resolution is required!',
            'channel_id.required' => 'Channel Number is required!',
            'indoor_cam_no.required' => 'Indoor cam is required!',
            'outdoor_cam_no.required' => 'Outdoor cam is required!',
        
        ];
    }
}
