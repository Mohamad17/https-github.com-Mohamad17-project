@extends('admin.layouts.master')
@section('head-tag')
    <title>تنظیمات</title>
@endsection

@section('content')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb font-size-12">
			<li class="breadcrumb-item"><a href="#">خانه</a></li>
			<li class="breadcrumb-item active" aria-current="page">تنظیمات</li>
		</ol>
	</nav>
	<div class="col-md-12 mt-4">
		<div class="content">
			<h4>تنظیمات</h4>
			<div class="d-flex justify-content-between align-items-center my-3">
				<a class="btn btn-info btn-sm disabled">ایجاد تنظیمات</a>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">عنوان سایت</th>
							<th scope="col">توضیحات سایت</th>
							<th scope="col">کلمات کلیدی</th>
							<th scope="col">لوگوی سایت</th>
							<th scope="col">آیکون سایت</th>
							<th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>{{ $setting->title }}</td>
							<td>{{ $setting->description }}</td>
							<td>{{ $setting->keywords }}</td>
							<td><img src="{{ asset($setting->icon) }}"
								alt="icon" class="img-fluid" width="50"></td>
							<td><img src="{{ asset($setting->logo) }}"
								alt="logo" class="img-fluid" width="50"></td>
							<td class="width-16rem">
                                <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                            </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
        
@endsection
