<?php

namespace App\Http\Controllers\Admin\Content\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Content\V1\CategoryApi;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = PostCategory::all();
        return new CategoryApi($postCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

  
    public function store(PostCategoryRequest $request, ImageService $imageService)
    {
        $inputs= $request->all();
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->errors());
        }
       
        if($request->hasFile('image')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'post-category');
            $image= $imageService->createIndexAndSave($request->file('image'));
            if($image === false)
            {
                return response()->json([
                    'data'=>[
                        'message'=> 'آپلود تصویر با خطا مواجه شد',
                    ],
                ]);
            }
            $inputs['image'] = $image;
        }
        
        PostCategory::create($inputs);
        return response()->json([
            'data'=>[
                'message'=> 'ثبت دسته بندی با موفقیت انجام شد',
            ],
        ]);
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
