@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد پیج ساز</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active">پیج ساز</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد پیج جدید</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد پیج جدید</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.page.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.content.page.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان صفحه</label>
                    <input class="form-control form-control-sm" value="{{ old('title') }}" name="title" type="text" placeholder="عنوان صفحه ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="url">آدرس صفحه</label>
                    <input class="form-control form-control-sm" value="{{ old('url') }}" name="url" type="text" placeholder="آدرس صفحه ...">
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
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label for="tags">تگ ها</label>
                    <input type="hidden" class="form-control form-control-sm" name="tags"
                        id="tags" value="{{ old('tags') }}">
                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                    </select>
                </div>
                @error('tags')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
				<fieldset class="form-group">
					<label for="body">محتوی صفحه</label>
					<textarea class="form-control form-control-sm" id="body" name="body" cols="6">{{ old('body') }}</textarea>
				</fieldset>
                @error('body')
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
