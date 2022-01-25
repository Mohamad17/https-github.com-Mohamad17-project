@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش فروش شگفت انگیز</title>
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
		<form class="row" action="#" method="post">
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">نام کالا</label>
					<input class="form-control form-control-sm" name="name" type="text" placeholder="">
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
				<button class="btn btn-sm btn-primary" type="submit">ویرایش</button>
			</div>
		</form>
	</div>
</div>
@endsection