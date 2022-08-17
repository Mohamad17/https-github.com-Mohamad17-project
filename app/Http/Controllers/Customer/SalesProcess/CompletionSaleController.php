<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompletionSaleController extends Controller
{
    public function completionSale(){
        $user= Auth::user();
        if(CartItem::where('user_id', $user->id)->count()== 0){
            return redirect()->route('customer.sales-process.cart');
        }
        return view('customer.completioan-sale');
    }

    public function setAddressAndDelivery(){
        
        
    }
}
