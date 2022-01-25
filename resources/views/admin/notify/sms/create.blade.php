@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد اطلاعیه پیامکی </title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
        <li class="breadcrumb-item active">اطلاع رسانی پیامکی</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد اطلاعیه پیامکی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد اطلاعیه پیامکی</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="#" method="post">
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان ایمیل</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="عنوان ایمیل ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">تاریخ ارسال</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="تاریخ ارسال ...">
                </fieldset>
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="body">متن پیامک</label>
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