@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش فرم محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">فرم محصول</li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش فرم محصول</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ویرایش فرم محصول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.property.value.index', $property->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.market.property.value.update', ['property'=>$property->id, 'value'=>$value->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="value">مقدار فرم محصول</label>
                        <input class="form-control form-control-sm" name="value" value="{{ old('value', json_decode($value->value)->value) }}" type="text"
                            placeholder="مقدار فرم محصول ...">
                    </fieldset>
                    @error('value')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="price_increase">میزان افزایش قیمت</label>
                        <input class="form-control form-control-sm" name="price_increase" value="{{ old('price_increase', json_decode($value->value)->price_increase) }}" type="text"
                            placeholder="میزان افزایش قیمت ...">
                    </fieldset>
                    @error('price_increase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="product_id">انتخاب محصول</label>
                        <select class="form-control form-control-sm" name="product_id" id="product_id">
                            <option value="">محصول مورد نظر را انتخاب شود</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @if (old('product_id', $value->product_id) == $product->id) selected @endif>
                                    {{ $product->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @error('product_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="type">نوع انتخاب مقدار</label>
                        <select class="form-control form-control-sm" name="type" id="type">
                            <option value="0" @if (old('type', $value->type) == 0) selected @endif>ساده</option>
                            <option value="1" @if (old('type', $value->type) == 1) selected @endif>چند تایی</option>
                        </select>
                    </fieldset>
                    @error('type')
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
