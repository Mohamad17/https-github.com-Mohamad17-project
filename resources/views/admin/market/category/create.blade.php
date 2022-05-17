@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد دسته بندی</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
        <li class="breadcrumb-item active">دسته بندی</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد دسته بندی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد دسته بندی</h4>
	<div class="d-flex justify-content-between align-items-center my-3">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
	</div>
    <form class="row" action="{{ route('admin.market.category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 mb-2">
            <fieldset class="form-group">
                <label for="name">نام دسته بندی</label>
                <input class="form-control form-control-sm" value="{{ old('name') }}" name="name" id="name" type="text" placeholder="نام دسته بندی ...">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </fieldset>
        </div>
        <div class="col-md-6 mb-2">
            <fieldset class="form-group">
                <label for="parent_id">منوی والد</label>
                <select class="form-control form-control-sm" name="parent_id">
                    <option value="">درصورت وجود والد انتخاب شود</option>
                    @foreach ($productCategories as $productCategory)
                        <option value="{{ $productCategory->id }}" @if (old('parent_id') == $productCategory->id)
                            selected
                    @endif>{{ $productCategory->name }}</option>
                    @endforeach
                </select>
            </fieldset>
            @error('parent_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <div class="form-group">
                <label for="select_tags">تگ ها</label>
                <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags') }}">
                <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                </select>
            </div>
            @error('tags')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <fieldset class="form-group">
                <label for="status">وضعیت</label>
                <select class="form-control form-control-sm" name="status" id="status">
                    <option value="0" @if (old('status')==0) selected @endif>غیر فعال</option>
                    <option value="1" @if (old('status')==1) selected @endif>فعال</option>
                </select>
            </fieldset>
            @error('status')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <fieldset class="form-group">
                <label for="show_in_menu">نمایش در منو</label>
                <select class="form-control form-control-sm" name="show_in_menu">
                    <option value="0" @if (old('show_in_menu')==0) selected @endif>غیر فعال</option>
                    <option value="1" @if (old('show_in_menu')==1) selected @endif>فعال</option>
                </select>
            </fieldset>
            @error('show_in_menu')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6 mb-2">
            <fieldset class="form-group">
                <label for="image">تصویر</label>
                <input class="form-control form-control-sm" name="image" id="image" type="file">
            </fieldset>
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <fieldset class="form-group">
                <label for="description">توضیحات</label>
                <textarea class="form-control form-control-sm" name="description" id="description" rows="6">{{ old('description') }}</textarea>
            </fieldset>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12 mb-2">
            <button class="btn btn-sm btn-primary" type="submit">ثبت</button>
        </div>
    </form>
</div>        
@endsection
@section('script')
<script src="{{ asset('admin-asset/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>
<script>
    $(document).ready(function() {
        var tags = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags= tags.val();
        var default_data= null;
       
        if(tags.val() !== null && tags.val().length > 0){
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder: 'لطفاً تگ های خود را وارد کنید',
            tags: true,
            data:default_data
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

