@extends('admin.layouts.master')
@section('head-tag')
    <title>فرم های محصول</title>
@endsection

@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb font-size-12">
			<li class="breadcrumb-item"><a href="#">خانه</a></li>
			<li class="breadcrumb-item"><a href="#">بخش فروش</a></li>
			<li class="breadcrumb-item active" aria-current="page">فرم محصول</li>
		</ol>
	</nav>
	<div class="col-md-12 mt-4">
		<div class="content">
			<h4>فرم محصول</h4>
			<div class="d-flex justify-content-between align-items-center my-3">
				<a href="{{ route('admin.market.property.create') }}" class="btn btn-info btn-sm">ایجاد فرم محصول</a>
				<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">نام فرم</th>
							<th scope="col">فرم والد</th>
							<th scope="col" class="max-width-22rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>نمایشگر</td>
							<td>کالای الکترونیکی</td>
							<td class="width-22rem">
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>ویژگی ها</a>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                            </td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>نمایشگر</td>
							<td>کالای الکترونیکی</td>
							<td class="width-22rem">
                                <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit mx-1"></i>ویژگی ها</a>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash mx-1"></i>حذف</button>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
        
@endsection
