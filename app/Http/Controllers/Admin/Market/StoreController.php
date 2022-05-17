<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\StoreRequest;


class StoreController extends Controller
{
   
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.store.index', compact('products'));
    }

   
    public function addToStore(Product $product)
    {
        return view('admin.market.store.add-to-store', compact('product'));
    }

   
    public function store(StoreRequest $request, Product $product)
    {
        $product->marketable_number+= $request->marketable_number;
        $product->save();
        Log::info('receiver=>{$request->reciever}, deliverer=> {$request->deliverer},
        count=> {$request->marketable_number}, description=>{$request->description}');
        return redirect()->route('admin.market.store.index')->with('swal-success', 'موجودی کالای مورد نظر با موفقیت اضافه شد');
    }

    public function edit(Product $product)
    {
        return view('admin.market.store.edit', compact('product'));
    }

   
    public function update(StoreRequest $request, Product $product)
    {
        $inputs= $request->all();
        $product->update($inputs);
        return redirect()->route('admin.market.store.index')->with('swal-success', 'موجودی کالای مورد نظر با موفقیت ویرایش شد');
    }
}
