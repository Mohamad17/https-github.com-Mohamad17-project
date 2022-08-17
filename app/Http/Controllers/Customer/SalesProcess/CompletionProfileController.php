<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use App\Rules\NationalCode;
use Illuminate\Support\Facades\Auth;

class CompletionProfileController extends Controller
{
    public function completionProfile(){
        $user= Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        return view('customer.completion-profile', compact('user', 'cartItems'));
    }

    public function update(Request $request){
        $request->validate([
            'first_name' => 'sometimes|required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'last_name' => 'sometimes|required|max:120|min:1|regex:/^[ا-یa-zA-Zء-ي ]+$/u',
            'mobile' => 'sometimes|required|regex:/^09[0-9]{9}$/|unique:users',
            'national_code' => ['sometimes','required','digits:10',new NationalCode(),'unique:users'],
            'email' => 'sometimes|nullable|email|unique:users',
        ]);
        $user= Auth::user();
        $inputs= $request->all();
        if(isset($inputs['mobile']) && empty($user->mobile)){
            $mobile= persianToEnglish($inputs['mobile']);
            $mobile= arabicToEnglish($inputs['mobile']);
            $inputs['mobile']= $mobile;
        }

        $user= Auth::user();
        $user->update($inputs);

        return redirect()->route('customer.sales-process.completion-sale');
    }
}
