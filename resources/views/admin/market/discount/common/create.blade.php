@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد تخفیف عمومی</title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">تخفیف عمومی</li>
		<li class="breadcrumb-item active" aria-current="page">ایجاد تخفیف عمومی</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ایجاد تخفیف عمومی</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.discount.common') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="{{ route('admin.market.discount.common.store') }}" method="post">
			@csrf
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="percentage">درصد تخفیف</label>
					<input class="form-control form-control-sm" name="percentage" value="{{ old('percentage') }}" type="text" placeholder="درصد تخفیف ...">
				</fieldset>
				@error('percentage')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="discount_ceiling">حداکثر تخفیف</label>
					<input class="form-control form-control-sm" name="discount_ceiling" value="{{ old('discount_ceiling') }}" type="text" placeholder="حداکثر تخفیف ...">
				</fieldset>
				@error('discount_ceiling')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="minimal_order_amount">حداقل مبلغ خرید</label>
					<input class="form-control form-control-sm" name="minimal_order_amount" value="{{ old('minimal_order_amount') }}" type="text" placeholder="حداقل مبلغ خرید ...">
				</fieldset>
				@error('minimal_order_amount')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="title">عنوان مناسبت</label>
					<input class="form-control form-control-sm" name="title" value="{{ old('title') }}" type="text" placeholder="عنوان مناسبت ...">
				</fieldset>
				@error('title')
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
					<label for="start_date">تاریخ شروع</label>
					<input class="form-control form-control-sm d-none" name="start_date" id="start_date" type="text" placeholder="تاریخ شروع ...">
                    <input class="form-control form-control-sm" id="start_date_view" type="text" placeholder="تاریخ شروع ...">
				</fieldset>
				@error('start_date')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="end_date">تاریخ پایان</label>
					<input class="form-control form-control-sm d-none" name="end_date" id="end_date" type="text" placeholder="تاریخ پایان ...">
                    <input class="form-control form-control-sm" id="end_date_view" type="text" placeholder="تاریخ پایان ...">
				</fieldset>
				@error('end_date')
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
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-date.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script>
	$(document).ready(function(){
		$("#start_date_view").persianDatepicker({
			 viewMode: 'YYYY-MM-DD',
			 altField: '#start_date'
		});
		$("#end_date_view").persianDatepicker({
			 viewMode: 'YYYY-MM-DD',
			 altField: '#end_date'
		});
	})
</script>
@endsection