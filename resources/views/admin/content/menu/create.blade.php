@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد منو</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item active">منو</li>
            <li class="breadcrumb-item active" aria-current="page">ایجاد منو</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>ایجاد منو</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </div>
            <form class="row" action="{{ route('admin.content.menu.store') }}" method="post">
                @csrf
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="name">نام منو</label>
                        <input class="form-control form-control-sm" value="{{ old('name') }}" name="name" type="text" placeholder="نام منو ...">
                    </fieldset>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="parent_id">منوی والد</label>
                        <select class="form-control form-control-sm" name="parent_id">
                            <option value="">درصورت وجود والد انتخاب شود</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" @if (old('parent_id') == $menu->id)
                                    selected
                            @endif>{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @error('parent_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-2">
                    <fieldset class="form-group">
                        <label for="url">لینک url</label>
                        <input class="form-control form-control-sm" value="{{ old('url') }}" name="url" type="text" placeholder="لینک ...">
                    </fieldset>
                    @error('url')
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
                <div class="col-md-6 mb-2">
                    <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
                </div>
            </form>
        </div>
    </div>
@endsection
