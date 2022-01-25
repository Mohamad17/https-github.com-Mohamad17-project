@extends('admin.layouts.master')
@section('head-tag')
<title>کاربران ادمین</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش کاربران</a></li>
        <li class="breadcrumb-item active" aria-current="page">کاربران ادمین</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>کاربران ادمین</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
            <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">شماره همراه</th>
                        <th scope="col">نام</th>
                        <th scope="col">نام خانوادگی</th>
                        <th scope="col">نقش</th>
                        <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>oldapadana@gmail.com</td>
                        <td>09108060772</td>
                        <td>محمد</td>
                        <td>رحمتی</td>
                        <td>سوپر ادمین</td>
                        <td class="width-16rem">
                            <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>نقش</a>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>s_rahmati17@yahoo.com</td>
                        <td>09108062126</td>
                        <td>مهدی</td>
                        <td>رحمتی</td>
                        <td>سوپر ادمین</td>
                        <td class="width-16rem">
                            <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>نقش</a>
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
