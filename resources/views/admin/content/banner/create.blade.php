@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد بنر</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active">بنر</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد بنر جدید</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد بنر جدید</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.banner.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.content.banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان بنر</label>
                    <input class="form-control form-control-sm" value="{{ old('title') }}" name="title" type="text" placeholder="عنوان بنر ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="url">آدرس بنر</label>
                    <input class="form-control form-control-sm" value="{{ old('url') }}" name="url" type="text" placeholder="آدرس بنر ...">
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
                <fieldset class="form-group">
                    <label for="position">جایگاه بنر</label>
                    <select class="form-control form-control-sm" name="position" id="position">
                        @foreach ($positions as $key=>$position)
                        <option value="{{ $key }}" @if (old('position') == $key) selected @endif>{{ $position }}</option>
                        @endforeach
                    </select>
                </fieldset>
                @error('position')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="image">تصویر</label>
                    <input type="file" name="image" id="image" class="form-control form-control-sm">
                </fieldset>
                @error('image')
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

@section('script')
<script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('body');
</script>
<script>
    $(document).ready(function() {
        var tags = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags.val();
        var default_data = null;

        if (tags.val() !== null && tags.val().length > 0) {
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder: 'لطفاً تگ های خود را وارد کنید',
            tags: true,
            data: default_data
        });
        select_tags.children('option').attr('selected', true).trigger('change');

        $('form').submit(getTags);

        function getTags(event) {
            if (select_tags.val() !== null && select_tags.val().length > 0) {
                var selectedSource = select_tags.val().join(',');
                tags.val(selectedSource)
            }
        }
    });
</script>
@endsection
