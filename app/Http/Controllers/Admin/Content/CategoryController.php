<?php

namespace App\Http\Controllers\Admin\Content;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
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

    public function store(PostCategoryRequest $request)
    {
        // dd($request->all());
        $inputs= $request->all();
        $inputs['slug'] = str_replace(' ', '-', $inputs['name']) . '-' . Str::random(5);
        $inputs['image'] = 'image';
        PostCategory::create($inputs);
        return redirect()->route('admin.content.category.index')->with('swal-success','دسته بندی شما باموفقیت اضافه شد');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(PostCategory $postCategory)
    {
        return view('admin.content.category.edit',compact('postCategory'));
    }

  
    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $inputs= $request->all();
        $inputs['image'] = 'image';
        $postCategory->update($inputs);
        return redirect()->route('admin.content.category.index');
    }

   
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return back();
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
