<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

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
                'name'=> 'required|max:50|min:2',
                'description'=> 'required|max:650|min:5',
                'tags'=> 'required',
                'image'=> 'required',
                'slug'=> 'nullable',
                'status'=> 'required|numeric|in:0,1'
            ];
        }else{
            return [
                'name'=> 'required|max:50|min:2',
                'description'=> 'required|max:650|min:5',
                'tags'=> 'required',
                'image'=> 'nullable',
                'slug'=> 'nullable',
                'status'=> 'required|numeric|in:0,1'
            ];
        }
    }
}
