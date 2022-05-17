<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'reciever'=> 'required|max:50|min:2',
                'deliverer'=> 'required|max:50|min:2',
                'marketable_number'=> 'required|numeric',
                'description'=> 'required|max:1000|min:5',
            ];
        }else{
           return [
            'marketable_number'=> 'required|numeric',
            'sold_number'=> 'required|numeric',
            'frozen_number'=> 'required|numeric',
           ];
        }
    }
}
