@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد مشتری </title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active">مشتری</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد مشتری</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد مشتری</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.user.customer.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="first_name">نام</label>
                    <input class="form-control form-control-sm" value="{{ old('first_name') }}" name="first_name" type="text" placeholder="نام ...">
                </fieldset>
                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="last_name">نام خانوادگی</label>
                    <input class="form-control form-control-sm" value="{{ old('last_name') }}" name="last_name" type="text" placeholder="نام خانوادگی ...">
                </fieldset>
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="email">ایمیل</label>
                    <input class="form-control form-control-sm" value="{{ old('email') }}" name="email" type="text" placeholder="ایمیل ...">
                </fieldset>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="mobile">شماره همراه</label>
                    <input class="form-control form-control-sm" value="{{ old('mobile') }}" name="mobile" type="text" placeholder="شماره همراه ...">
                </fieldset>
                @error('mobile')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input class="form-control form-control-sm" value="{{ old('password') }}" name="password" type="password" placeholder="کلمه عبور ...">
                </fieldset>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="password_confirmation">تکرار کلمه عبور</label>
                    <input class="form-control form-control-sm" name="password_confirmation" type="password" placeholder="تکرار کلمه عبور ...">
                </fieldset>
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="activation">وضعیت فعال بودن ادمین</label>
                    <select class="form-control form-control-sm" name="activation">
                        <option value="0" @if (old('activation')==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('activation')==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('activation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="profile_photo_path">تصویر</label>
                    <input type="file" name="profile_photo_path" class="form-control form-control-sm">
                </fieldset>
                @error('profile_photo_path')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection