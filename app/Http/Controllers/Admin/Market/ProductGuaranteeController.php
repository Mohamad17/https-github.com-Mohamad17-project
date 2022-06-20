<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\Guarantee;

class ProductGuaranteeController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.product.guarantee.index' ,compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.product.guarantee.create' ,compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-ء-ي ]+$/u',
            'price_increase' => 'required|numeric',
            'status'=> 'required|numeric|in:0,1',
        ]);

        $inputs= $request->all();
        $inputs['product_id']= $product->id;
        Guarantee::create($inputs);
        return redirect()->route('admin.market.product.guarantee.index', $product->id)->with('swal-success', 'گارانتی شما با موفقیت اضافه شد');
    }

    public function edit(Guarantee $guarantee)
    {
        return view('admin.market.product.guarantee.edit' ,compact('guarantee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guarantee $guarantee)
    {
        $request->validate([
            'name' => 'required|max:50|min:2|regex:/^[ا-یa-zA-Z0-9\-ء-ي ]+$/u',
            'price_increase' => 'required|numeric',
            'status'=> 'required|numeric|in:0,1',
        ]);

        $inputs= $request->all();
        $guarantee->update($inputs);
        return redirect()->route('admin.market.product.guarantee.index', $guarantee->product_id)->with('swal-success', 'گارانتی شما با موفقیت ویرایش شد');
    }

    public function destroy(Guarantee $guarantee)
    {
        $guarantee->delete();
        return back()->with('swal-success', 'حذف گارانتی مورد نظر با موفقیت انجام شد');
    }
}
