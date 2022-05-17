@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش تنظیمات </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item" aria-current="page">تنظیمات</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش تنظیمات</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش تنظیمات</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.setting.update', [$setting->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان سایت</label>
                    <input class="form-control form-control-sm" value="{{ old('title',$setting->title) }}" name="title" type="text" placeholder="عنوان سایت ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="logo">لوگو</label>
                    <input class="form-control form-control-sm" name="logo" id="logo" type="file">
                </fieldset>
                @error('logo')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="icon">آیکون</label>
                    <input class="form-control form-control-sm" name="icon" id="icon" type="file">
                </fieldset>
                @error('icon')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="description">توضیحات سایت</label>
                    <textarea class="form-control form-control-sm" id="description" name="description" cols="6"> {{ old('description',$setting->description) }}</textarea>
                </fieldset>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="keywords">کلمات کلیدی</label>
                    <textarea class="form-control form-control-sm" id="keywords" name="keywords" cols="6"> {{ old('keywords',$setting->keywords) }}</textarea>
                </fieldset>
                @error('keywords')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection