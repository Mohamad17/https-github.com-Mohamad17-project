<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\PostCategoryRequest;

class CategoryController extends Controller
{
    
    public function index()
    {
        $postCategories = PostCategory::orderBy('created_at', 'desc')->simplePaginate(15);
        return view('admin.content.category.index', compact('postCategories'));
    }
     
    public function create()
    {
        return view('admin.content.category.create');
    }

    public function store(PostCategoryRequest $request, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'post-category');
            $image= $imageService->createIndexAndSave($request->file('image'));
            if($image === false)
            {
            return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }   
            $inputs['image'] = $image;
        }
        
        
        PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی شما با موفقیت اضافه شد');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit',compact('postCategory'));
    }

  
    public function update(PostCategoryRequest $request, PostCategory $postCategory, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('image')){
            if(!empty($inputs['image'])){
                $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'post-category');
            $image= $imageService->createIndexAndSave($request->file('image'));
            if($image === false)
            {
                return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $image;
        }elseif(isset($inputs['currentImage']) && !empty($postCategory->image))
        {
            $image = $postCategory->image;
            $image['currentImage'] = $inputs['currentImage'];
            $inputs['image'] = $image;
        }
        
        $postCategory->update($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی شما با موفقیت ویرایش شد');
    }

   
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return back()->with('swal-success','دسته بندی شما با موفقیت حذف شد');
    }

    public function status(PostCategory $postCategory)
    {
        $postCategory->status= $postCategory->status == 0 ? 1 : 0;
        $result=$postCategory->save();
        if($result){
            if($postCategory->status==0){
                return response()->json(['status'=> true, 'checked'=>false]);
            }else{
                return response()->json(['status'=> true, 'checked'=>true]);
            }

        }else{
            return response()->json(['status'=> false]);
        }
    }
}
