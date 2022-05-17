@extends('admin.layouts.master')
@section('head-tag')
<title>نمایش نظر</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
	<ol class="breadcrumb font-size-12">
		<li class="breadcrumb-item"><a href="#">خانه</a></li>
		<li class="breadcrumb-item"><a href="#">بخش محتوی</a></li>
		<li class="breadcrumb-item active">بخش نظرات</li>
		<li class="breadcrumb-item active" aria-current="page">نمایش نظر</li>
	</ol>
</nav>
<div class="col-md-12 mt-4">
	<div class="content">
		<h4>نمایش نظر</h4>
		<div class="d-flex justify-content-between align-items-center my-3">
			<a href="{{ route('admin.content.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
		</div>
		<div class="card mb-4">
			<div class="card-header bg-custom-orange text-white">
				<span class="ml-1">{{ $comment->user->fullName }}</span>
				<span class="ml-1">-</span>
				<span class="ml-1">{{ $comment->author_id }}</span>
			</div>
			<div class="card-body">
				<div class="card-title">
					<span class="ml-1">عنوان مقاله  :</span>
					<span class="ml-1">{{  $comment->commentable->title  }}</span>
					<span class="ml-1">کد مقاله :</span>
					<span class="ml-1">{{ $comment->commentable_id }}</span>
				</div>
				<div class="blockquote-footer">
					{{ $comment->body }}
				</div>
			</div>
		</div>
		@if ($comment->parent_id==null)
		<form action="{{ route('admin.content.comment.answer', [$comment->id]) }}" method="post">
			@csrf
			<div class="form-group">
				<label for="body">پاسخ ادمین</label>
				<textarea rows="4" class="form-control" name="body">متن پاسخ ...</textarea>
			</div>
			<div class="form-group mb-2">
				<button class="btn btn-sm btn-primary" type="submit">ارسال پاسخ</button>
			</div>
		</form>
		@endif
	</div>
</div>
@endsection