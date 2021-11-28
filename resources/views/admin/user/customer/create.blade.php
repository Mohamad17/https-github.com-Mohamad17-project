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
        <form class="row" action="#" method="post">
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">نام</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="نام ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">نام خانوادگی</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="نام خانوادگی ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">ایمیل</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="ایمیل ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">شماره همراه</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="شماره همراه ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">کلمه عبور</label>
                    <input class="form-control form-control-sm" name="name" type="password" placeholder="کلمه عبور ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">تکرار کلمه عبور</label>
                    <input class="form-control form-control-sm" name="name" type="password" placeholder="تکرار کلمه عبور ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">کد ملی</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="کد ملی ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">وضعیت کاربر</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="0">غیر فعال</option>
                        <option value="1">فعال</option>
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
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection