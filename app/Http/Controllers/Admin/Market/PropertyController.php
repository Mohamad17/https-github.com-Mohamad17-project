<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Models\Market\CategoryAttribute;
use App\Http\Requests\Admin\Market\CategoryAttributeRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes= CategoryAttribute::orderBy('created_at', 'desc')->simplePaginate(15);;
        return view('admin.market.property.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= ProductCategory::all();
        return view('admin.market.property.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAttributeRequest $request)
    {
        $inputs= $request->all();
        CategoryAttribute::create($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم محصول شما با موفقیت اضافه شد');
    }

    public function edit(CategoryAttribute $property)
    {
        $categories= ProductCategory::all();
        return view('admin.market.property.edit', compact('property', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAttributeRequest $request, CategoryAttribute $property)
    {
        $inputs= $request->all();
        $property->update($inputs);
        return redirect()->route('admin.market.property.index')->with('swal-success', 'فرم محصول شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $property)
    {
        $property->delete();
        return back()->with('swal-success', 'فرم محصول مورد نظر با موفقیت حذف شد');
    }
}
