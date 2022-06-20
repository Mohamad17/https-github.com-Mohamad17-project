<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRegisterRequest extends FormRequest
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
        $isMobile= preg_match('/^\d+$/', request()->id);
        if($isMobile){
            return [
                'id'=> ['required', 'regex:/^09[0-9]{9}$/']
            ];
            
        }else{
            return [
                'id'=> ['required', 'email','max:80','min:5']
            ];
        }
    }

    public function attributes()
    {
        $isMobile= preg_match('/^\d+$/', request()->id);
        if(!$isMobile){
            return [
                'id'=> 'ایمیل'
            ];
        }else{
            return [
                'id'=> 'شماره همراه'
            ];
        }
    }
}
