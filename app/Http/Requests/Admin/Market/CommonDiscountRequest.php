<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscountRequest extends FormRequest
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
            'title' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'percentage' => 'required|numeric|between:1,100',
            'discount_ceiling' => 'required|integer',
            'minimal_order_amount' => 'required|numeric',
            'status'=> 'required|numeric|in:0,1',
            'start_date'=> 'required|numeric',
            'end_date'=> 'required|numeric',
        ];
    }
}
