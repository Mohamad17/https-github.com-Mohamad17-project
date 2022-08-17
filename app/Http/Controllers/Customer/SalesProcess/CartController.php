<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Market\CartItem;
use App\Models\Market\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $relatedProducts = Product::all();
            $cartItems = CartItem::where('user_id', $user->id)->get();
            return view('customer.cart', compact('user', 'relatedProducts', 'cartItems'));
        } else {
            return view('customer.auth.login-register');
        }
    }

    public function addToCart(Request $request, Product $product)
    {
        if (Auth::check()) {
            $request->validate([
                'color' => 'nullable|exists:product_colors,id',
                'guarantee' => 'nullable|exists:guarantees,id',
                'number' => 'numeric|min:1',
            ]);
            $cartItems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();

            if (!isset($request->color)) {
                $request->color = null;
            }

            if (!isset($request->guarantee)) {
                $request->guarantee = null;
            }

            if (!empty($cartItems)) {
                foreach ($cartItems as $cartItem) {
                    if ($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee) {
                        $newNumber = $cartItem->number + $request->number;
                        $cartItem->update(['number' => $newNumber]);
                        return back()->with('toast-success', 'سبد خرید شما به روزرسانی  شد');;
                    }
                }
            }

            $inputs = [];
            $inputs['user_id'] = auth()->user()->id;
            $inputs['product_id'] = $product->id;
            $inputs['color_id'] = $request->color;
            $inputs['guarantee_id'] = $request->guarantee;
            $inputs['number'] = $request->number;

            CartItem::create($inputs);
            return back()->with('toast-success', 'محصول مورد نظر به سبد خرید شما اضافه شد');
        } else {
            return redirect()->route('customer.auth.login-register-form')->withErrors(['add-to-cart' => 'برای افزودن به سبد خرید ابتدا باید وارد شوید']);
        }
    }

    public function updateCart(Request $request)
    {
        // dd('update caart');
        // $request->validate([
        //     'number' => 'numeric|nullable'
        // ]);

        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach ($cartItems as $cartItem) {
            if (isset($inputs['number'][$cartItem->id])) {
                $cartItem->update(['number'=> $inputs['number'][$cartItem->id]]);
            }
        }
        return redirect()->route('customer.sales-process.completion-sale');
    }

    public function removeFromCart(CartItem $cartItem)
    {
        if ($cartItem->user_id == Auth::user()->id) {
            $cartItem->delete();
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 2]);
        }
    }
}
