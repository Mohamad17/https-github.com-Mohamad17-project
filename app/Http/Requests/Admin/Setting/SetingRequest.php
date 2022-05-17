<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SetingRequest extends FormRequest
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
            'title'=> 'nullable|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'dexcription'=> 'nullable|max:250|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;&؟? ]+$/u',
            'keuwords'=> 'nullable|max:250|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;&؟? ]+$/u',
            'icon'=> 'nullable|image|mimes:png,jpg,jpeg,gif',
            'logo' =>  'nullable|image|mimes:png,jpg,jpeg,gif',
        ];
    }
}
