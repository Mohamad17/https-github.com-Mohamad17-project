@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد کپن تخفیف</title>
<link rel="stylesheet" href="{{ asset('admin-asset/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">کپن تخفیف</li>
		<li class="breadcrumb-item active" aria-current="page">ایجاد کپن تخفیف</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ایجاد کپن تخفیف</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.discount.copan') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="{{ route('admin.market.discount.copan.store') }}" method="post">
			@csrf
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="code">کد کپن</label>
					<input class="form-control form-control-sm" name="code" value="{{ old('code') }}" type="text" placeholder="کد ...">
				</fieldset>
				@error('code')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="type">نوع کپن</label>
					<select class="form-control form-control-sm" name="type" id="type">
						<option value="0" @if (old('type')==0) selected @endif>عمومی</option>
						<option value="1" @if (old('type')==1) selected @endif>شخصی</option>
					</select>
				</fieldset>
				@error('type')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="user_id">کاربر</label>
					<select class="form-control form-control-sm" name="user_id" id="user_id" disabled>
						<option value="">کاربر مورد نظر را انتخاب شود</option>
						@foreach ($users as $user)
							<option value="{{ $user->id }}" @if (old('user_id') == $user->id) selected @endif>
								{{ $user->full_name }}</option>
						@endforeach
					</select>
				</fieldset>
				@error('user_id')
					<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="amount">مبلغ تخفیف</label>
					<input class="form-control form-control-sm" name="amount" value="{{ old('amount') }}" type="text" placeholder="مبلغ تخفیف ...">
				</fieldset>
				@error('amount')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="amount_type">نوع تخفیف</label>
					<select class="form-control form-control-sm" name="amount_type" id="status">
						<option value="0" @if (old('amount_type')==0) selected @endif>درصدی</option>
						<option value="1" @if (old('amount_type')==1) selected @endif>مبلغی</option>
					</select>
				</fieldset>
				@error('amount_type')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="discount_ceiling">حداکثر تخفیف</label>
					<input class="form-control form-control-sm" name="discount_ceiling" value="{{ old('discount_ceiling') }}" type="text" placeholder="حد اکثر تخفیف ...">
				</fieldset>
				@error('discount_ceiling')
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

		$('#type').on('change', function(){
			if($(this).val()==1){
				console.log($('#user_id').attr('disabled'))
				$('#user_id').attr('disabled', false)
			}else{
				console.log($('#user_id').attr('disabled'))
				$('#user_id').attr('disabled', true)
			}
		});
	})
</script>
@endsection