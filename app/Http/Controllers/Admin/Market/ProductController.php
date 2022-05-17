<?php

namespace App\Http\Controllers\Admin\Market;

use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\ProductMeta;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.market.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.create', compact('productCategories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        $timestampPublish = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$timestampPublish);
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products');
            $image = $imageService->createIndexAndSave($request->file('image'));
            if ($image === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $image;
        }
        DB::transaction(function () use ($request, $inputs) {
            $product = Product::create($inputs);
            if ($request->meta_key[0] != null && $request->meta_value[0] != null) {
                $metas = array_combine($request->meta_key, $request->meta_value);
                foreach ($metas as $key => $meta) {
                    $meta = ProductMeta::create(['meta_key' => $key, 'meta_value' => $meta, 'product_id' => $product->id]);
                }
            }
        });
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت اضافه شد');
    }

    public function edit(Product $product)
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.edit', compact('productCategories', 'brands', 'product'));
    }


    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        $timestampPublish = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date('Y-m-d H:i:s', (int)$timestampPublish);
        if ($request->hasFile('image')) {
            if (!empty($inputs['image'])) {
                $imageService->deleteDirectoryAndFiles($product->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'products');
            $image = $imageService->createIndexAndSave($request->file('image'));
            if ($image === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $image;
        } elseif (isset($inputs['currentImage']) && !empty($product->image)) {
            $image = $product->image;
            $image['currentImage'] = $inputs['currentImage'];
            $inputs['image'] = $image;
        }
        DB::transaction(function () use ($request, $inputs, $product) {
            $product->update($inputs);
            if (isset($request->meta_key_update) && isset($request->meta_value_update)) {
                $meta_keys = $request->meta_key_update;
                $meta_values = $request->meta_value_update;
                $meta_ids = array_keys($request->meta_key_update);
                $updateMetas = array_map(function ($meta_id, $meta_key, $meta_value) {
                    return array_combine(
                        ['meta_id', 'meta_key', 'meta_value'],
                        [$meta_id, $meta_key, $meta_value]
                    );
                }, $meta_ids, $meta_keys, $meta_values);
                foreach ($updateMetas as $meta_item) {
                    ProductMeta::where('id', $meta_item['meta_id'])->update([
                        'meta_key' => $meta_item['meta_key'], 'meta_value' => $meta_item['meta_value']
                    ]);
                }
            }
            if ($request->meta_key[0] != null && $request->meta_value[0] != null) {
                $metas = array_combine($request->meta_key, $request->meta_value);
                foreach ($metas as $key => $meta) {
                    $meta = ProductMeta::create(['meta_key' => $key, 'meta_value' => $meta, 'product_id' => $product->id]);
                }
            }
        });
        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('swal-success', 'حذف محصول مورد نظر با موفقیت انجام شد');
    }

    public function deleteMeta(ProductMeta $meta)
    {
        $result = $meta->delete();
        echo  $result;
    }
}
