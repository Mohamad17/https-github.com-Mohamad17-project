@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد رنگ جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">رنگ</li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد رنگ جدید </li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ایجاد رنگ جدید </h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.product.color.index', $product->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.market.product.color.store', $product->id) }}" method="post">
                @csrf
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="color_name">نام رنگ</label>
                        <input class="form-control form-control-sm" name="color_name" value="{{ old('color_name') }}" type="text"
                            placeholder="نام رنگ ...">
                    </fieldset>
                    @error('color_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="price_increase">میزان افزایش قیمت</label>
                        <input class="form-control form-control-sm" name="price_increase" value="{{ old('price_increase') }}" type="text"
                            placeholder="میزان افزایش قیمت ...">
                    </fieldset>
                    @error('price_increase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="status">وضعیت</label>
                        <select class="form-control form-control-sm" name="status" id="status">
                            <option value="0" @if (old('status') == 0) selected @endif>غیر فعال</option>
                            <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
                        </select>
                    </fieldset>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection