<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyValueController extends Controller
{
    
    public function index(CategoryAttribute $property)
    {
        return view('admin.market.property.value.index' ,compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryAttribute $property)
    {
        $products= $property->category->products;
        return view('admin.market.property.value.create' ,compact('property', 'products'));
    }

    
    public function store(CategoryValueRequest $request, CategoryAttribute $property)
    {
        $inputs= $request->all();
        $inputs['value']= json_encode(['value'=>$request->value, 'price_increase'=>$request->price_increase]);
        $inputs['category_attribute_id']= $property->id;
        CategoryValue::create($inputs);
        return redirect()->route('admin.market.property.value.index', $property->id)->with('swal-success', 'مقدار ویژگی محصول شما با موفقیت اضافه شد');
    }

    
    public function edit(CategoryAttribute $property, CategoryValue $value)
    {
        $products= $property->category->products;
        return view('admin.market.property.value.edit' ,compact('value', 'products', 'property'));
    }

   
    public function update(CategoryValueRequest $request, CategoryAttribute $property, CategoryValue $value)
    {
        $inputs= $request->all();
        $inputs['value']= json_encode(['value'=>$request->value, 'price_increase'=>$request->price_increase]);
        $inputs['category_attribute_id']= $property->id;
        $value->update($inputs);
        return redirect()->route('admin.market.property.value.index', $property->id)->with('swal-success', 'مقدار ویژگی محصول شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( CategoryValue $value)
    {
        $value->delete();
        return back()->with('swal-success', 'مقدار ویژگی محصول شما با موفقیت حذف شد');
    }
}
