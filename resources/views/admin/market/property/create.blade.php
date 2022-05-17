@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد فرم محصول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item active">فرم محصول</li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد فرم محصول</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ایجاد فرم محصول</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.market.property.store') }}" method="post">
                @csrf
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="name">نام فرم محصول</label>
                        <input class="form-control form-control-sm" value="{{ old('name') }}" name="name" type="text"
                            placeholder="نام ...">
                    </fieldset>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="unit">واحد اندازه گیره</label>
                        <input class="form-control form-control-sm" value="{{ old('unit') }}" name="unit" type="text"
                            placeholder="واحد اندازه گیری ...">
                    </fieldset>
                    @error('unit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="category_id">دسته بندی</label>
                        <select class="form-control form-control-sm" name="category_id" id="category_id">
                            <option value="">دسته بندی را انتخاب شود</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @error('category_id')
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
