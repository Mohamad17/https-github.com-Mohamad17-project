<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\User\AdminUserRequest;
use App\Notifications\NewUserRegistered;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::where('user_type', 0)->orderBy('created_at')->simplePaginate(15);
        return view('admin.user.customer.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.customer.create');
    }

    public function store(AdminUserRequest $request, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('profile_photo_path')){
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'customers');
            $image= $imageService->save($request->file('profile_photo_path'));
            if($image === false)
            {
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $image;
        }
        $inputs['password']= Hash::make($request->password);
        $inputs['user_type']=0;
        User::create($inputs);
        $admin= User::find(1);
        $admin->notify(new NewUserRegistered('یک کاربر جدید ثبت نام شد'));
        return redirect()->route('admin.user.customer.index')->with('swal-success', 'مشتری جدید با موفقیت ثبت شد');
    }
    
   
    public function edit(User $user)
    {
        return view('admin.user.customer.edit', compact('user'));
    }

    public function update(AdminUserRequest $request, User $user, ImageService $imageService)
    {
        $inputs= $request->all();
        if($request->hasFile('profile_photo_path')){
            if(!empty($user->profile_photo_path)){
                $imageService->deleteImage($user->profile_photo_path);
            }
            $imageService->setExclusiveDirectory('images'.DIRECTORY_SEPARATOR.'customers');
            $image= $imageService->save($request->file('profile_photo_path'));
            if($image === false)
            {
                return redirect()->route('admin.user.customer.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['profile_photo_path'] = $image;
        }
        $user->update($inputs);
        return redirect()->route('admin.user.customer.index')->with('swal-success', 'مشتری با موفقیت ویرایش شد');
    }
    public function destroy(User $user)
    {
        $user->forceDelete();
        return back()->with('swal-success', 'مشتری با موفقیت حذف شد');
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
