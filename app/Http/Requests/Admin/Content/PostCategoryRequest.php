<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class PostCategoryRequest extends FormRequest
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
                'name'=> 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'description'=> 'required|max:650|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&؟? ]+$/u',
                'tags'=> 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'image'=> 'required|image|mimes:jpg,png,jpeg',
                'status'=> 'required|numeric|in:0,1'
            ];
        }else{
            return [
                'name'=> 'required|max:50|min:2',
                'description'=> 'required|max:650|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&؟? ]+$/u',
                'tags'=> 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'image'=> 'image|mimes:jpg,png,jpeg',
                'status'=> 'required|numeric|in:0,1'
            ];
        }
    }
    
    public $validator;
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
