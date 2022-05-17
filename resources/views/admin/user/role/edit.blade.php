@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد نقش</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active">نقش </li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد نقش جدید </li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد نقش جدید </h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.user.role.update', $role->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="col-md-5 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان نقش</label>
                    <input class="form-control form-control-sm" name="name" value="{{ old('name', $role->name) }}" type="text" placeholder="عنوان نقش ...">
                </fieldset>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-5 mb-2">
                <fieldset class="form-group">
                    <label for="description">توضیح نقش</label>
                    <input class="form-control form-control-sm" name="description" value="{{ old('description', $role->description) }}" type="text" placeholder="توضیح نقش ...">
                </fieldset>
                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-2 mb-2 mt-32px">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection