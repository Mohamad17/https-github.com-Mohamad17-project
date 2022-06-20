<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Product;
use App\Models\Market\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.product.color.index' ,compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.product.color.create' ,compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'color' => 'required|max:50',
            'color_name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-ء-ي ]+$/u',
            'price_increase' => 'required|numeric',
            'status'=> 'required|numeric|in:0,1',
        ]);

        $inputs= $request->all();
        $inputs['product_id']= $product->id;
        ProductColor::create($inputs);
        return redirect()->route('admin.market.product.color.index', $product->id)->with('swal-success', 'رنگ شما با موفقیت اضافه شد');
    }

    public function edit(ProductColor $color)
    {
        return view('admin.market.product.color.edit' ,compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductColor $color)
    {
        $request->validate([
            'color' => 'required|max:50',
            'color_name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-ء-ي ]+$/u',
            'price_increase' => 'required|numeric',
            'status'=> 'required|numeric|in:0,1',
        ]);

        $inputs= $request->all();
        $color->update($inputs);
        return redirect()->route('admin.market.product.color.index', $color->product_id)->with('swal-success', 'رنگ شما با موفقیت ویرایش شد');
    }

    public function destroy(ProductColor $color)
    {
        $color->delete();
        return back()->with('swal-success', 'حذف رنگ مورد نظر با موفقیت انجام شد');
    }
}
