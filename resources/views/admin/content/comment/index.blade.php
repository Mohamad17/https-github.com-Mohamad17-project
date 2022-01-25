@extends('admin.layouts.master')
@section('head-tag')
<title>نظرات</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
		<li class="breadcrumb-item active" aria-current="page">بخش نظرات</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>نظرات</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="#" class="btn btn-info btn-sm disabled">ایجاد نظرات</a>
			<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">نویسنده نظر</th>
						<th scope="col">کد کاربر</th>
						<th scope="col">کد محصول</th>
						<th scope="col">نام محصول</th>
						<th scope="col">وضعیت</th>
						<th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>سهیل احمدی</td>
						<td>13487</td>
						<td>13487</td>
						<td>شارژر شیائومی</td>
						<td>در انتظار تأیید</td>
						<td class="width-16rem">
							<a href="{{ route('admin.market.comment.show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye mx-1"></i>نمایش</a>
							<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check mx-1"></i>تأیید</button>
						</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>سهیل احمدی</td>
						<td>13487</td>
						<td>13487</td>
						<td>شارژر شیائومی</td>
						<td>تأیید شده</td>
						<td class="width-16rem">
							<a href="{{ route('admin.market.comment.show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye mx-1"></i>نمایش</a>
							<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-exclamation-circle mx-1"></i>عدم تأیید</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection