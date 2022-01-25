@extends('admin.layouts.master')
@section('head-tag')
    <title>تیکت ها</title>
@endsection

@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb font-size-12">
			<li class="breadcrumb-item"><a href="#">خانه</a></li>
			<li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
			<li class="breadcrumb-item active" aria-current="page">تیکت ها</li>
		</ol>
	</nav>
	<div class="col-md-12 mt-4">
		<div class="content">
			<h4>تیکت ها</h4>
			<div class="d-flex justify-content-between align-items-center my-3">
				<a class="btn btn-info btn-sm disabled">ایجاد تیکت ها</a>
				<input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">نویسنده تیکت</th>
							<th scope="col">عنوان تیکت</th>
							<th scope="col">دسته بندی تیکت</th>
							<th scope="col">اولویت تیکت</th>
							<th scope="col">ارجاع شده از</th>
							<th scope="col" class="max-width-9rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>علی رحمانی</td>
							<td>عدم ثبت سفارش</td>
							<td>گوشی همراه</td>
							<td>معمولی</td>
							<td>-</td>
							<td class="width-9rem">
                                <a href="{{ route('admin.tickets.show') }}" class="btn btn-info btn-sm"><i class="fa fa-eye mx-1"></i>مشاهده</a>
                            </td>
						</tr>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
        
@endsection
