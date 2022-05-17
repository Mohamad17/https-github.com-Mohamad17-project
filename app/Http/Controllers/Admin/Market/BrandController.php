<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands= Brand::orderBy('created_at')->simplePaginate(15);
        return view('admin.market.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request,ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('logo')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'brands');
            $image= $imageService->createIndexAndSave($request->file('logo'));
            if($image === false)
            {
            return redirect()->route('admin.market.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }   
            $inputs['logo'] = $image;
        }
        
        
        Brand::create($inputs);
        return redirect()->route('admin.market.brand.index')->with('swal-success','برند شما با موفقیت اضافه شد');
    }

    public function edit(Brand $brand)
    {
        return view('admin.market.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('logo')){
            if(!empty($inputs['logo'])){
                $imageService->deleteDirectoryAndFiles($brand->logo['directory']);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'brands');
            $image= $imageService->createIndexAndSave($request->file('logo'));
            if($image === false)
            {
                return redirect()->route('admin.market.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $image;
        }elseif(isset($inputs['currentImage']) && !empty($brand->logo))
        {
            $image = $brand->logo;
            $image['currentImage'] = $inputs['currentImage'];
            $inputs['logo'] = $image;
        }
        
        $brand->update($inputs);
        return redirect()->route('admin.market.brand.index')->with('swal-success','برند شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('swal-success','برند مورد نظر با موفقیت حذف شد');
    }
}
