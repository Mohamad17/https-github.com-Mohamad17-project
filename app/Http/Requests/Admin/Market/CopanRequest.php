<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
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
            'code' => 'required|max:50|min:2|regex:/^[a-zA-Z0-9 ]+$/u',
            'amount' => ['required', 'numeric', request()->amount_type==0? 'between:1,100': '','min:1'],
            'discount_ceiling' => 'required|integer|min:1',
            'amount_type' => 'required|numeric|in:0,1',
            'status'=> 'required|numeric|in:0,1',
            'type'=> 'required|numeric|in:0,1',
            'user_id'=> 'required_if:type,==,1|exists:users,id',
            'start_date'=> 'required|numeric',
            'end_date'=> 'required|numeric',
        ];
    }

    public function attributes()
    {
       return [
        'type'=> 'نوع کپن',
        'amount_type'=> 'نوع تخفیف کپن',
       ];
    }
}
