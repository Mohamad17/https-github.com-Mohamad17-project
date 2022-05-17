<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                'status'=> 'required|numeric|in:0,1',
                'show_in_menu'=> 'required|numeric|in:0,1',
                'parent_id' => 'exists:product_categories,id|nullable',
            ];
        }else{
            return [
                'name'=> 'required|max:50|min:2',
                'description'=> 'required|max:650|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r&؟? ]+$/u',
                'tags'=> 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'image'=> 'nullable|image|mimes:jpg,png,jpeg',
                'status'=> 'required|numeric|in:0,1',
                'show_in_menu'=> 'required|numeric|in:0,1',
                'parent_id' => 'exists:product_categories,id|nullable',
            ];
        }
    }
}
