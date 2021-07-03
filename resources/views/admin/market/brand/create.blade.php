@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد برند </title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active">دسته بندی</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد برند</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد برند</h4>
	<div class="d-flex justify-content-between align-items-center my-3">
                    <a href="{{ route('admin.market.brand.index') }}" class="btn btn-info btn-sm">بازگشت</a>
	</div>
	<form class="row" action="#" method="post">
                <div class="col-md-6 mb-2">
                  <fieldset class="form-group">
                     <label for="name">نام برند</label>
                     <input class="form-control form-control-sm" name="name" type="text" placeholder="نام ...">
                  </fieldset>
                </div>
                <div class="col-md-6 mb-2">
                  <fieldset class="form-group">
                     <label for="name">لوگو</label>
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
