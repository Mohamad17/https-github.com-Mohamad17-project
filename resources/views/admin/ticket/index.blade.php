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
			<h4>{{ $title }}</h4>
			<div class="d-flex justify-content-between align-items-center my-3">
				<a class="btn btn-info btn-sm disabled">ایجاد تیکت</a>
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
							<th scope="col">پاسخ به</th>
							<th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tickets as $ticket)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $ticket->user->fullName }}</td>
							<td>{{ $ticket->subject }}</td>
							<td>{{ $ticket->category->name }}</td>
							<td>{{ $ticket->priority->name }}</td>
							<td>{{ $ticket->admin->user->fullName }}</td>
							<td>{{ $ticket->parent->subject?? '-' }}</td>
							<td class="width-16rem">
                                <a href="{{ route('admin.ticket.change', $ticket->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-exchange-alt mx-1"></i>{{ $ticket->status==0? "بستن تیکت": "باز کردن تیکت" }}</a>
                                <a href="{{ route('admin.ticket.show', $ticket->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye mx-1"></i>مشاهده</a>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
        
@endsection
