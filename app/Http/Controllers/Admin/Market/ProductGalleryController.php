<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Gallery;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.product.gallery.index' ,compact('product'));
    }

    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create' ,compact('product'));
    }

    public function store(Request $request, ImageService $imageService, Product $product)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);
        $inputs= $request->all();
        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-gallery');
            $image= $imageService->createIndexAndSave($request->file('image'));
            if($image === false)
            {
            return redirect()->route('admin.market.product.gallery.index', $product->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }   
            $inputs['image'] = $image;
        }
        $inputs['product_id']= $product->id;
        Gallery::create($inputs);
        return redirect()->route('admin.market.product.gallery.index', $product->id)->with('swal-success', 'تصویر شما با موفقیت اضافه شد');
    }

    public function edit(Gallery $image)
    {
        return view('admin.market.product.gallery.edit' ,compact('image'));
    }

   
    public function update(Request $request, ImageService $imageService, Gallery $image)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $inputs= $request->all();
        if($request->hasFile('image')){
            if(!empty($inputs['image'])){
                $imageService->deleteDirectoryAndFiles($image->image['directory']);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'product-gallery');
            $img= $imageService->createIndexAndSave($request->file('image'));
            if($img === false)
            {
                return redirect()->route('admin.market.product.gallery.index', $image->product_id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $img;
        }
        $image->update($inputs);
        return redirect()->route('admin.market.product.gallery.index', $image->product_id)->with('swal-success', 'تصویر شما با موفقیت ویرایش شد');
    }

    public function destroy(Gallery $image)
    {
        $image->delete();
        return back()->with('swal-success', 'حذف تصویر مورد نظر با موفقیت انجام شد');
    }
}
