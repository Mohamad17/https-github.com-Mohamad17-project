@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش کپن تخفیف</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">کپن تخفیف</li>
		<li class="breadcrumb-item active" aria-current="page">ویرایش کپن تخفیف</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ویرایش کپن تخفیف</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.discount.coupon') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="#" method="post">
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">کد کپن</label>
					<input class="form-control form-control-sm" name="name" type="text" placeholder="">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">نوع کپن</label>
					<select class="form-control form-control-sm" name="price">
						<option value="1">عمومی</option>
						<option value="2">اختصاصی</option>
					</select>
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">درصد تخفیف</label>
					<input class="form-control form-control-sm" name="delivery_time" type="text" placeholder="">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">حداکثر تخفیف</label>
					<input class="form-control form-control-sm" name="delivery_time" type="text" placeholder="">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">عنوان مناسبت</label>
					<input class="form-control form-control-sm" name="delivery_time" type="text" placeholder="">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">تاریخ شروع</label>
					<input class="form-control form-control-sm" name="delivery_time" type="text" placeholder="">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">تاریخ پایان</label>
					<input class="form-control form-control-sm" name="delivery_time" type="text" placeholder="">
				</fieldset>
			</div>			
			<div class="col-md-12 mb-2">
				<button class="btn btn-sm btn-primary" type="submit">ثبت</button>
			</div>
		</form>
	</div>
</div>
@endsection