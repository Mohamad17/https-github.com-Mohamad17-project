@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش روش ارسال</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">روش ارسال</li>
		<li class="breadcrumb-item active" aria-current="page">ویرایش روش ارسال</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ویرایش روش ارسال</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.delivery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="{{ route('admin.market.delivery.update', $delivery->id) }}" method="post">
			@csrf
			{{ method_field('put') }}
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">نام روش ارسال</label>
					<input class="form-control form-control-sm" value="{{ old('name', $delivery->name) }}" name="name" type="text" placeholder="نام ...">
				</fieldset>
				@error('name')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="amount">هزینه ارسال </label>
					<input class="form-control form-control-sm" value="{{ old('amount', $delivery->amount) }}" name="amount" type="text" placeholder="هزینه ارسال ...">
				</fieldset>
				@error('amount')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="delivery_time">زمان تحویل </label>
					<input class="form-control form-control-sm" value="{{ old('delivery_time', $delivery->delivery_time) }}" name="delivery_time" type="text" placeholder="زمان تحویل ...">
				</fieldset>
				@error('delivery_time')
				<small class="text-danger">{{ $message }}</small>
				@enderror
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="delivery_time_unit">واحد زمان تحویل </label>
					<input class="form-control form-control-sm" value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}" name="delivery_time_unit" type="text" placeholder="واحد زمان تحویل ...">
				</fieldset>
				@error('delivery_time_unit')
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