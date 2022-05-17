<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $route= Route::currentRouteName();
        if($route== 'admin.user.role.store'){
            return [
                'name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'description' => 'required|max:650|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;&؟? ]+$/u',
                'permissions.*' => 'exists:permissions,id'
            ];
        }elseif($route== 'admin.user.role.update'){
            return [
                'name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
                'description' => 'required|max:650|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;&؟? ]+$/u',
            ];
        }elseif($route== 'admin.user.role.update-permissions'){
            return [
                'permissions.*' => 'exists:permissions,id'
            ];
        }
       
    }

    public function attributes()
    {
        return [
            'name' => 'عنوان نقش',
            'permissions.*' => 'دسترسی'
        ];
    }
}
