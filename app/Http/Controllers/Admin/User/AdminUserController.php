<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Http\Services\Image\ImageService;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins= User::where('user_type', 1)->orderBy('created_at')->simplePaginate(15);
        return view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('profile_photo_path')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'admin-users');
            $image= $imageService->save($request->file('profile_photo_path'));
            if($image === false)
            {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $image;
        }
        $inputs['password']= Hash::make($request->password);
        $inputs['user_type']=1;
        User::create($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'کاربر ادمین با موفقیت ثبت شد');
    }

   
    public function edit(User $user)
    {
        return view('admin.user.admin-user.edit', compact('user'));
    }

    public function update(AdminUserRequest $request, User $user, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('profile_photo_path')){
            if(!empty($user->profile_photo_path)){
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'admin-users');
            $image= $imageService->save($request->file('profile_photo_path'));
            if($image === false)
            {
                return redirect()->route('admin.user.admin-user.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $image;
        }
        $user->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'کاربر ادمین با موفقیت ویرایش شد');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->forceDelete();
        return back()->with('swal-success', 'کاربر ادمین با موفقیت حذف شد');
    }

    public function status(User $user)
    {
        $user->status= $user->status == 0 ? 1 : 0;
        $result=$user->save();
        if($result){
            if($user->status==0){
                return response()->json(['status'=> true, 'checked'=>false]);
            }else{
                return response()->json(['status'=> true, 'checked'=>true]);
            }

        }else{
            return response()->json(['status'=> false]);
        }
    }
    public function activation(User $user)
    {
        $user->activation= $user->activation == 0 ? 1 : 0;
        $result=$user->save();
        if($result){
            if($user->activation==0){
                return response()->json(['status'=> true, 'checked'=>false]);
            }else{
                return response()->json(['status'=> true, 'checked'=>true]);
            }

        }else{
            return response()->json(['status'=> false]);
        }
    }
}
