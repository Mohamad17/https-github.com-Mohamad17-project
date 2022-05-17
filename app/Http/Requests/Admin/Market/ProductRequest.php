<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'introduction'=> 'required|max:5000|min:50',
                'tags'=> 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'status'=> 'required|numeric|in:0,1',
                'marketable'=> 'required|numeric|in:0,1',
                'weight'=> 'required|numeric',
                'length'=> 'required|numeric',
                'width'=> 'required|numeric',
                'height'=> 'required|numeric',
                'price'=> 'required|numeric',
                'brand_id'=> 'required|exists:brands,id',
                'category_id'=> 'required|exists:product_categories,id',
                'published_at' => 'required|numeric',
                'image'=> 'required|image|mimes:jpg,png,jpeg',
            ];
        }else{
            return [
                'name'=> 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'introduction'=> 'required|max:5000|min:50',
                'tags'=> 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'status'=> 'required|numeric|in:0,1',
                'marketable'=> 'required|numeric|in:0,1',
                'weight'=> 'required|numeric',
                'length'=> 'required|numeric',
                'width'=> 'required|numeric',
                'height'=> 'required|numeric',
                'price'=> 'required|numeric',
                'brand_id'=> 'required|exists:brands,id',
                'category_id'=> 'required|exists:product_categories,id',
                'published_at' => 'required|numeric',
                'image'=> 'nullable|image|mimes:jpg,png,jpeg',
            ];
        }
    }
}
