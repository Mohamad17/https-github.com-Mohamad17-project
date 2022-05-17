@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد دسته بندی تیکت </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش تیکت ها </a></li>
        <li class="breadcrumb-item active"> دسته بندی تیکت</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد دسته بندی تیکت</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد دسته بندی تیکت</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.ticket.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.ticket.category.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان دسته بندی تیکت</label>
                    <input class="form-control form-control-sm" value="{{ old('name') }}" name="name" type="text" placeholder="عنوان دسته بندی تیکت ...">
                </fieldset>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="status">وضعیت</label>
                    <select class="form-control form-control-sm" name="status" id="status">
                        <option value="0" @if (old('status')==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('status')==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('status')
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