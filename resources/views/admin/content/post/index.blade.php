@extends('admin.layouts.master')
@section('head-tag')
<title>مقالات</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active" aria-current="page">مقالات</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>مقالات</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.post.create') }}" class="btn btn-info btn-sm">ایجاد مقاله جدید</a>
            <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان پست</th>
                        <th scope="col">دسته بندی</th>
                        <th scope="col">تصویر</th>
                        <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>بررسی سیستم عامل لینوکس</td>
                        <td>سیستم عامل</td>
                        <td><img src="asset/images/avatar-2.jpg" alt="brand"></td>
                        <td class="width-16rem">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>بررسی توزیع لینوکسی مانجارو</td>
                        <td>سیستم عامل</td>
                        <td><img src="asset/images/avatar-2.jpg" alt="brand"></td>
                        <td class="width-16rem">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
