<?php

namespace App\Http\Controllers\Admin\Content\V1;

use App\Models\Content\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content\PostCategory;
use App\Http\Services\Image\ImageService;
use App\Http\Traits\ApiTrait\ApiResponser;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Resources\Admin\Content\V1\PostCategoryResource;
use App\Http\Resources\Admin\Content\V1\PostCategoryCollection;


class CategoryController extends Controller
{
    use ApiResponser;
    
    public function index()
    {
        $postCategories = PostCategory::all();
        // return $this->successResponse($postCategories, 200);
        // return $this->errorResponse(400, 'not found');
        // return new PostCategoryCollection($postCategories);
        // return (new PostCategoryCollection($postCategories))->additional([
        //     'manchester' => ['red' => 'united']
        // ]);
        return PostCategoryResource::collection($postCategories->load("posts"));
    }

   
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
        
        $data= PostCategory::create($inputs);
        return $this->successResponse($data,201, 'ثبت دسته بندی با موفقیت انجام شد');
    }

    
    public function show(PostCategory $postCategory)
    {
        return (new PostCategoryResource($postCategory))->additional([
                    'manchester' => ['red' => 'united']
                ]);
    }

    
    public function edit($id)
    {
        //
    }

    public function update(PostCategoryRequest $request, ImageService $imageService, PostCategory $postCategory)
    {
        $inputs= $request->all();
        // return response()->json($request->image);
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->errors());
        }
       
        if($request->hasFile('image')){
            if(!empty($inputs['image'])){
                $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
            }
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
        
        $data= $postCategory->update($inputs);
        return $this->successResponse($data,201, 'ویرایش دسته بندی با موفقیت انجام شد');
    }

    
    public function destroy(PostCategory $postCategory)
    {
        $data= $postCategory->delete();
        return $this->successResponse($data,201, 'حذف دسته بندی با موفقیت انجام شد');
    }
}
