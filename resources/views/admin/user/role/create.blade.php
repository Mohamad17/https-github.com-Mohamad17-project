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
        <form class="row" action="#" method="post">
            <div class="col-md-5 mb-2">
                <fieldset class="form-group">
                    <label for="name">عنوان نقش</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="عنوان نقش ...">
                </fieldset>
            </div>
            <div class="col-md-5 mb-2">
                <fieldset class="form-group">
                    <label for="name">توضیح نقش</label>
                    <input class="form-control form-control-sm" name="name" type="text" placeholder="توضیح نقش ...">
                </fieldset>
            </div>
            <div class="col-md-2 mb-2 mt-32px">
                <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
            </div>
            <div class="col-12 border-top mt-2 py-3">
                <div class="row justify-content-between">
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check1" name="permission">
                        <label for="check1" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check2" name="permission">
                        <label for="check2" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check3" name="permission">
                        <label for="check3" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check4" name="permission">
                        <label for="check4" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check5" name="permission">
                        <label for="check5" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check6" name="permission">
                        <label for="check6" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check7" name="permission">
                        <label for="check7" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" class="form-check-input checked" id="check8" name="permission">
                        <label for="check8" class="form-check-lable mr-3">نمایش دسته جدید</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection