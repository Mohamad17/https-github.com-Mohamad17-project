<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AddressRequest;
use App\Models\Market\CartItem;
use App\Models\Province;
use App\Models\User\Address;
use Illuminate\Support\Facades\Auth;

class CompletionSaleController extends Controller
{
    public function completionSale(){
        $user= Auth::user();
        if(CartItem::where('user_id', $user->id)->count()== 0){
            return redirect()->route('customer.sales-process.cart');
        }
        $addresses= $user->addresses;
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $prices= cartItemsTotalAll($cartItems);
        $provinces= Province::all();
        return view('customer.completioan-sale', compact('addresses', 'cartItems', 'prices' , 'provinces'));
    }
    
    public function getCities(Province $province){
        $cities= $province->cities;
        $response= ['status'=> true, 'cities' => $cities];
        return response()->json($response);
    }

    public function setAddressAndDelivery(AddressRequest $request){
        $inputs= $request->all();
        unset($inputs['province'], $inputs['my_self_reciever']);
        $inputs['user_id']= Auth::user()->id;
        $inputs['status']= 1;
        Address::create($inputs);
        return back();
    }
    
    public function updateAddressAndDelivery(AddressRequest $request, Address $address){
        $inputs= $request->all();
        unset($inputs['province'], $inputs['my_self_reciever']);
        $address->update($inputs);
        return back();
    }
}
