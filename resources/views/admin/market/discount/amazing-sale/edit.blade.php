@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش فروش شگفت انگیز</title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">فروش شگفت انگیز</li>
		<li class="breadcrumb-item active" aria-current="page">ویرایش فروش شگفت انگیز</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ویرایش فروش شگفت انگیز</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.discount.amazingSale') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="{{ route('admin.market.discount.amazingSale.update', $amazingSale->id) }}" method="post">
			@csrf
			@method('PUT')
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="product_id">نام محصول</label>
					<select class="form-control form-control-sm" name="product_id" id="product_id">
						<option value="">محصول مورد نظر را انتخاب شود</option>
						@foreach ($products as $product)
							<option value="{{ $product->id }}" @if (old('product_id', $amazingSale->product_id) == $product->id) selected @endif>
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
					<label for="percentage">درصد تخفیف</label>
					<input class="form-control form-control-sm" name="percentage" value="{{ old('percentage', $amazingSale->percentage) }}" type="text" placeholder="درصد تخفیف ...">
				</fieldset>
				@error('percentage')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="status">وضعیت</label>
					<select class="form-control form-control-sm" name="status" id="status">
						<option value="0" @if (old('status', $amazingSale->status)==0) selected @endif>غیر فعال</option>
						<option value="1" @if (old('status', $amazingSale->status)==1) selected @endif>فعال</option>
					</select>
				</fieldset>
				@error('status')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="start_date">تاریخ شروع</label>
					<input class="form-control form-control-sm d-none" name="start_date" value="{{ old('start_date',$amazingSale->start_date) }}" id="start_date" type="text" placeholder="تاریخ شروع ...">
                    <input class="form-control form-control-sm" id="start_date_view" value="{{ old('start_date',$amazingSale->start_date) }}" type="text" placeholder="تاریخ شروع ...">
				</fieldset>
				@error('start_date')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="end_date">تاریخ پایان</label>
					<input class="form-control form-control-sm d-none" name="end_date" value="{{ old('end_date',$amazingSale->end_date) }}" id="end_date" type="text" placeholder="تاریخ پایان ...">
                    <input class="form-control form-control-sm" id="end_date_view" value="{{ old('end_date',$amazingSale->end_date) }}" type="text" placeholder="تاریخ پایان ...">
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