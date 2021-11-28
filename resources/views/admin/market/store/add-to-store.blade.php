@extends('admin.layouts.master')
@section('head-tag')
<title>اضافه کردن به انبار</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active">انبار</li>
        <li class="breadcrumb-item active" aria-current="page">اضافه کردن به انبار</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>اضافه کردن به انبار</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="#" method="post">
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">نام تحویل گیرنده</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="نام تحویل گیرنده ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="name">نام تحویل دهنده</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="نام تحویل دهنده ...">
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="count">تعداد</label>
                    <input class="form-control form-control-sm" name="count" type="text" placeholder="تعداد ...">
                </fieldset>
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="name">توضحیات</label>
                    <textarea class="form-control form-control-sm" name="body" cols="30" rows="6"></textarea>
                </fieldset>
            </div>
            <div class="col-md-6 mb-2">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection
