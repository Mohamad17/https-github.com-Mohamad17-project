@extends('admin.layouts.master')
@section('head-tag')
<title>ایجاد محصول جدید</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
		<li class="breadcrumb-item active">دسته بندی</li>
		<li class="breadcrumb-item active" aria-current="page">ایجاد محصول جدید </li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>ایجاد محصول جدید </h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.market.delivery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<form class="row" action="#" method="post">
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="name">نام محصول</label>
					<input class="form-control form-control-sm" name="name" type="text" placeholder="نام ...">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
				   <label for="category">دسته بندی</label>
				   <select class="form-control form-control-sm" name="category">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
				   </select>
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
				   <label for="form">فرم کالا</label>
				   <select class="form-control form-control-sm" name="form">
					  <option value="1">1</option>
					  <option value="2">2</option>
					  <option value="3">3</option>
				   </select>
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="image">تصویر</label>
					<input class="form-control form-control-sm" name="image" type="file">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="price">قیمت</label>
					<input class="form-control form-control-sm" name="price" type="text" placeholder="قیمت ...">
				</fieldset>
			</div>
			<div class="col-md-6 mb-2">
				<fieldset class="form-group">
					<label for="weight">وزن</label>
					<input class="form-control form-control-sm" name="weight" type="text" placeholder="وزن ...">
				</fieldset>
			</div>
			<div class="col-12 mb-2">
				<fieldset class="form-group">
					<label for="body">توضیحات</label>
					<textarea class="form-control form-control-sm" id="body" name="body" cols="6" placeholder="توضیحات  ..."></textarea>
				</fieldset>
			</div>
			<section class="col-12 border-top border-bottom py-3 mb-3">
				<div class="form-row">
					<div class="col-6 col-md-3">
						<fieldset class="form-group">
							<input class="form-control form-control-sm" name="attribute" type="text" placeholder="ویژگی محصول ...">
						</fieldset>
					</div>
					<div class="col-6 col-md-3">
						<fieldset class="form-group">
							<input class="form-control form-control-sm" name="value" type="text" placeholder="مقدار ...">
						</fieldset>
					</div>
				</div>
				<div>
					<button class="btn btn-sm btn-success" type="button">افزودن</button>
				</div>
			</section>
			<div class="col-md-12 mb-2">
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
@endsection