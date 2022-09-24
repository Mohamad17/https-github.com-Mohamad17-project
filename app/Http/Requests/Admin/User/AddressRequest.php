<?php

namespace App\Http\Requests\Admin\User;

use App\Rules\PostalCode;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'province' => "required|exists:provinces,id",
            'city_id' => "required|exists:cities,id",
            'address' => "required|max:350|min:5",
            'postal_code' => ['required', new PostalCode()],
            'no' => "required|integer",
            'unit' => "required|integer|max:250|min:0",
            'my_self_reciever' => 'sometimes',
            'recipient_first_name' => 'required_without:my_self_reciever',
            'recipient_last_name' => 'required_without:my_self_reciever',
            'mobile' => ['required', 'regex:/^09[0-9]{9}$/'],
        ];
    }
    
    public function attributes() {
        return [
            'unit' => 'واحد',
            'mobile' => 'موبایل گیرنده',
            'city_id' => 'شهر',
        ];
    }
}
