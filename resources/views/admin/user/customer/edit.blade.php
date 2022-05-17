@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش مشتری </title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active">مشتری</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش مشتری</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش مشتری</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.user.customer.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="first_name">نام</label>
                    <input class="form-control form-control-sm" value="{{ old('first_name', $user->first_name) }}" name="first_name" type="text" placeholder="نام ...">
                </fieldset>
                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="last_name">نام خانوادگی</label>
                    <input class="form-control form-control-sm" value="{{ old('last_name', $user->last_name) }}" name="last_name" type="text" placeholder="نام خانوادگی ...">
                </fieldset>
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="activation">وضعیت فعال بودن ادمین</label>
                    <select class="form-control form-control-sm" name="activation">
                        <option value="0" @if (old('activation', $user->activation)==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('activation', $user->activation)==1) selected @endif>فعال</option>
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
                    <img src="{{ asset($user->profile_photo_path) }}" alt="" width="100" height="50" class="mt-3">
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