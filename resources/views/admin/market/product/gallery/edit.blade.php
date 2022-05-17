@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش تصویر</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">محصول</li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش تصویر </li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ویرایش تصویر </h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.product.gallery.index', $image->product_id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.market.product.gallery.update', $image->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="image">تصویر</label>
                        <input class="form-control form-control-sm" name="image" id="image" type="file">
                    </fieldset>
                    <img src="{{ asset($image->image['indexArray'][$image->image['currentImage']]) }}" alt="product image" class="img-fluid" width="300">
                </div>
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection