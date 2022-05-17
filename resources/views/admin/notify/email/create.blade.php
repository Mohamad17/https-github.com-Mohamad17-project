@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد اطلاعیه ایمیلی </title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb font-size-12">
        <li class="breadcrumb-item"><a href="#">خانه</a></li>
        <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
        <li class="breadcrumb-item active">اطلاع رسانی ایمیلی</li>
        <li class="breadcrumb-item active" aria-current="page">ایجاد اطلاعیه ایمیلی</li>
    </ol>
</nav>
<div class="col-md-12 mt-4">
    <div class="content">
        <h4>ایجاد اطلاعیه ایمیلی</h4>
        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="{{ route('admin.notify.email.index') }}" class="btn btn-info btn-sm">بازگشت</a>
        </div>
        <form class="row" action="{{ route('admin.notify.email.store') }}" method="post">
            @csrf
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="title">عنوان ایمیل</label>
                    <input class="form-control form-control-sm" value="{{ old('subject') }}" name="subject" type="text" placeholder="عنوان ایمیل ...">
                </fieldset>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-2">
                <fieldset class="form-group">
                    <label for="published_at">تاریخ ارسال</label>
                    <input class="form-control form-control-sm d-none" name="published_at" id="published_at" type="text" placeholder="تاریخ انتشار ...">
                    <input class="form-control form-control-sm" id="published_at_view" type="text" placeholder="تاریخ انتشار ...">
                </fieldset>
                @error('published_at')
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
            <div class="col-12 mb-2">
                <fieldset class="form-group">
                    <label for="body">متن ایمیل</label>
                    <textarea class="form-control form-control-sm" id="body" name="body" cols="6"> {{ old('body') }}</textarea>
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
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$("#published_at_view").persianDatepicker({
			 viewMode: 'YYYY-MM-DD',
			 altField: '#published_at',
             timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
            }
		});
	})
</script>
@endsection
