<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            "title"=> "required|min:4|max:650|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u",
            'status' => 'required|numeric|in:0,1',
            'url' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',
            'position' => 'required|numeric',
        ];
       }else{
        return [
            "title"=> "required|min:4|max:650|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u",
            'status' => 'required|numeric|in:0,1',
            'url' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'position' => 'required|numeric',
        ];
       }
    }
}
