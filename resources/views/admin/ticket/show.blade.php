@extends('admin.layouts.master')
@section('head-tag')
<title>نمایش تیکت ها</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش تیکت ها</a></li>
		<li class="breadcrumb-item active" aria-current="page">نمایش تیکت</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>نمایش نظر</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-custom-orange text-white">
				<span class="ml-1">{{ $ticket->user->fullName }}</span>
				<span class="ml-1">-</span>
				<span class="ml-1">{{ $ticket->user->id }}</span>
			</div>
			<div class="card-body">
				<div class="card-title">
					<span class="ml-1">{{ $ticket->subject }}</span>
					<small class="ml-1 text-muted text-weight-bold">{{ date_to_persian($ticket->created_at) }}</small>
				</div>
				<div class="blockquote-footer">
					{{ $ticket->description }}
				</div>
			</div>
		</div>
		@if ($ticket->ticket_id==null)
		<form action="{{ route('admin.ticket.answer', $ticket->id) }}" method="post">
			@csrf
			<div class="form-group">
				<label for="description">پاسخ تیکت</label>
				<textarea rows="4" class="form-control" name="description">متن پاسخ ...</textarea>
			</div>
			<div class="form-group mb-2">
				<button class="btn btn-sm btn-primary" type="submit">ثبت پاسخ</button>
			</div>
		</form>
		@endif
	</div>
</div>
@endsection