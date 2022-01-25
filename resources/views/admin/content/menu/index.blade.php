@extends('admin.layouts.master')
@section('head-tag')
<title>منو</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active" aria-current="page">منو</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>منو</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.menu.create') }}" class="btn btn-info btn-sm">ایجاد منو</a>
            <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام منو</th>
                        <th scope="col">منوی والد</th>
                        <th scope="col">لینک منو</th>
                        <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>صفحه اصلی</td>
                        <td>-</td>
                        <td>admin.home</td>
                        <td class="width-16rem">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>مقالات</td>
                        <td>-</td>
                        <td>admin.article</td>
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
