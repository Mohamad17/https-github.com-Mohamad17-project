@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش مقاله </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
        <li class="breadcrumb-item active">مقالات</li>
        <li class="breadcrumb-item active" aria-current="page">ویرایش مقاله</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ویرایش مقاله</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.content.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.content.post.update', [$post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان مقاله</label>
                    <input value="{{ old('title', $post->title) }}" class="form-control form-control-sm" name="title" id="title" type="text" placeholder="عنوان مقاله ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="category_id">دسته بندی</label>
                    <select class="form-control form-control-sm" name="category_id" id="category_id">
                        <option value="">دسته بندی را انتخاب شود</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id', $post->category_id)== $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </fieldset>
                @error('category_id')
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
                @php
                $number=1;
                @endphp
                <div class="custom-control custom-radio">
                    <div class="row">
                        @foreach ($post->image['indexArray'] as $key=>$image)
                        <div class="col-md-{{ 6/$number }}">
                            <input type="radio" value="{{ $key }}" class="custom-control-input" name="currentImage" id="{{ $number }}" @if ($key==$post->image['currentImage'])
                                checked
                            @endif>
                            <label class="custom-control-label" for="{{ $number }}">
                                <img src="{{ asset($image) }}" class="img-fluid w-100">
                            </label>
                        </div>
                        @php
                        $number++;
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="status">وضعیت</label>
                    <select class="form-control form-control-sm" name="status" id="status">
                        <option value="0" @if (old('status', $post->status)==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('status', $post->status)==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('status')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="commentable">قابلیت ثبت نظر</label>
                    <select class="form-control form-control-sm" name="commentable" id="commentable">
                        <option value="0" @if (old('commentable', $post->commantable)==0) selected @endif>غیر فعال</option>
                        <option value="1" @if (old('commentable', $post->commentable)==1) selected @endif>فعال</option>
                    </select>
                </fieldset>
                @error('commentable')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="published_at">تاریخ انتشار</label>
                    <input class="form-control form-control-sm d-none" value="{{ old('published_at',$post->published_at) }}" name="published_at" id="published_at" type="text" placeholder="تاریخ انتشار ...">
                    <input class="form-control form-control-sm" value="{{ old('published_at',$post->published_at) }}" id="published_at_view" type="text" placeholder="تاریخ انتشار ...">
                </fieldset>
                @error('published_at')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <div class="form-group">
                    <label for="tags">تگ ها</label>
                    <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags', $post->tags) }}">
                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                    </select>
                </div>
                @error('tags')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="summary">خلاصه مقاله</label>
                    <textarea class="form-control form-control-sm" id="summary" name="summary" cols="6">{{ old('summary', $post->summary) }}</textarea>
                </fieldset>
                @error('summary')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="body">محتوی مقاله</label>
                    <textarea class="form-control form-control-sm" id="body" name="body" cols="6">{{ old('body', $post->body) }}</textarea>
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
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
    CKEDITOR.replace('body');
    CKEDITOR.replace('summary');
</script>
<script>
	$(document).ready(function(){
		$("#published_at_view").persianDatepicker({
			 viewMode: 'YYYY-MM-DD',
			 altField: '#published_at'
		});
	})
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