@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد مقاله </title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active">مقالات</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد مقاله</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد مقاله</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="#" method="post">
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان مقاله</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="عنوان مقاله ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">دسته بندی</label>
                    <select class="form-control form-control-sm" name="parent_id">
                        <option value="">دسته بندی را انتخاب شود</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">تصویر</label>
                    <input type="file" name="logo" class="form-control form-control-sm">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">تاریخ انتشار</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="تاریخ انتشار ...">
                </fieldset>
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="body">محتوی مقاله</label>
                    <textarea class="form-control form-control-sm" id="body" name="body" cols="6"></textarea>
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
</script>
@endsection