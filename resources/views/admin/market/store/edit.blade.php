@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش کردن به انبار</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active">انبار</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش کردن به انبار</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش کردن به انبار</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <h5>{{ $product->name }}</h5>
            <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.market.store.update', $product->id) }}" method="post">
        	@csrf
            @method('PUT')
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="count">موجودی</label>
                    <input class="form-control form-control-sm" value="{{ old('marketable_number', $product->marketable_number) }}" name="marketable_number" type="text" placeholder="موجودی ...">
                </fieldset>
                @error('marketable_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="count">تعداد فروخته شده</label>
                    <input class="form-control form-control-sm" value="{{ old('sold_number', $product->sold_number) }}" name="sold_number" type="text" placeholder="تعداد فروختخه شده ...">
                </fieldset>
                @error('sold_number')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="count">تعداد رزرو شده</label>
                    <input class="form-control form-control-sm" value="{{ old('frozen_number', $product->frozen_number) }}" name="frozen_number" type="text" placeholder="تعداد رزرو شده ...">
                </fieldset>
                @error('frozen_number')
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
