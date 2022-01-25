@extends('admin.layouts.master')
@section('head-tag')
    <title>انبار</title>
@endsection

@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb font-size-12">
			<li class="breadcrumb-item"><a href="#">خانه</a></li>
			<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
			<li class="breadcrumb-item active" aria-current="page">انبار</li>
		</ol>
	</nav>
	<div class="col-md-12 mt-4">
		<div class="content">
			<h4>انبار</h4>
			<div class="d-flex justify-content-between align-items-center my-3">
				<a class="btn btn-info btn-sm disabled">ایجاد انبار</a>
				<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">نام محصول</th>
							<th scope="col">تصویر</th>
							<th scope="col">موجودی</th>
							<th scope="col">ورودی انبار</th>
							<th scope="col">خروجی انبار</th>
							<th scope="col" class="max-width-22rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>موبایل موتورولا G8</td>
							<td><img src="asset/images/avatar-2.jpg" alt="product"></td>
							<td>16</td>
							<td>36</td>
							<td>20</td>
							<td class="width-22rem">
                                <a href="{{ route('admin.market.store.add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>افزایش موجودی</a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>اصلاح موجودی</a>
                            </td>
						</tr>
						<tr>
							<th scope="row">1</th>
							<td>موبایل موتورولا G8</td>
							<td><img src="asset/images/avatar-2.jpg" alt="product"></td>
							<td>16</td>
							<td>36</td>
							<td>20</td>
							<td class="width-22rem">
                                <a href="{{ route('admin.market.store.add-to-store') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>افزایش موجودی</a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>اصلاح موجودی</a>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
        
@endsection
