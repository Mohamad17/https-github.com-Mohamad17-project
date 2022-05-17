@extends('admin.layouts.master')
@section('head-tag')
    <title>نظرات</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش فروشگاه</a></li>
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
                            <th scope="col">متن نظر</th>
                            <th scope="col">پاسخ به</th>
                            <th scope="col">نویسنده نظر</th>
                            <th scope="col">کد نویسنده</th>
                            <th scope="col">کد مقاله</th>
                            <th scope="col">نام مقاله</th>
                            <th scope="col">وضعیت تأیید</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ Str::limit($comment->body, 30) }}</td>
                                <td>{{ $comment->parent_id?Str::limit($comment->parent->body, 30): "" }}</td>
                                <td>{{ $comment->user->fullName }}</td>
                                <td>{{ $comment->author_id }}</td>
                                <td>{{ $comment->commentable_id }}</td>
                                <td>{{ $comment->commentable->name }}</td>
                                <td>
                                    @if ($comment->approved == 0)
                                        <span class="text-danger" id="{{ $comment->id.'appr' }}">در انتظار تأیید</span>
                                    @else
                                        <span class="text-success" id="{{ $comment->id.'appr' }}">تأیید شده</span>
                                    @endif
                                </td>
                                <td>
                                    <label><input id="{{ $comment->id.'sts' }}"
                                            data-url="{{ route('admin.market.comment.status', [$comment->id]) }}"
                                            onchange="changeStatus({{ $comment->id }})" type="checkbox"
                                            @if ($comment->status == 1) checked @endif></label>
                                </td>
                                <td class="width-16rem">
                                    <a href="{{ route('admin.market.comment.show', [$comment->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-eye mx-1"></i>نمایش</a>
                                    <button id="{{ $comment->id }}"
										data-url="{{ route('admin.market.comment.approve', [$comment->id]) }}"
										onclick="changeApprove({{ $comment->id }})"
                                        class="btn @if ($comment->approved == 0) btn-success
									@else
									btn-warning @endif btn-sm">
                                        @if ($comment->approved == 0)
                                        <i class="fas fa-check mx-1" id="{{ $comment->id.'check' }}"></i>
                                            <span>تأیید</span>
                                        @else
                                        <i class="fas fa-times-circle mx-1" id="{{ $comment->id.'check' }}"></i>
                                            <span>عدم تأیید</span>
                                        @endif
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changeApprove(id) {
            var element = $('#' + id);
            var appr= $('#' + id+'appr');
            var check= $('#' + id+'check');
            var url = element.attr('data-url');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.approved==0) {
                        element.removeClass('btn-warning');
                        element.addClass('btn-success');
                        appr.removeClass('text-success');
                        appr.addClass('text-danger');
                        appr.text('در انتظار تأیید');
                        check.removeClass('fa-times-circle');
                        check.addClass('fa-check');
						element.children('span').text('تأیید');
						errorAlert('عدم تأیید نظر با موفقیت انجام شد');
                    } else {
						element.removeClass('btn-success');
                        element.addClass('btn-warning');
                        appr.removeClass('text-danger');
                        appr.addClass('text-success');
                        appr.text('تأیید شده');
                        check.removeClass('fa-check');
                        check.addClass('fa-times-circle');
						element.children('span').text('عدم تأیید');
						successAlert('نظر با موفقیت تأیید شد');
                    }
                },
                error: function() {
                    element.prop('checked', exStatus);
                    errorAlert('تغییر وضعیت تأیید نظر انجام نشد');
                }
            });

            function successAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }

            function errorAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }
        }

        function changeStatus(id) {
            var element = $('#' + id+'sts');
            var url = element.attr('data-url');
            var exStatus = !element.prop('checked');

            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successAlert('وضعیت با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successAlert('وضعیت با موفقیت غیر فعال شد');
                        }
                    } else {
                        element.prop('checked', exStatus);
                        errorAlert('تغییر وضعیت انجام نشد');
                    }
                },
                error: function() {
                    element.prop('checked', exStatus);
                    errorAlert('تغییر وضعیت انجام نشد');
                }
            });

            function successAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }

            function errorAlert(message) {
                var toastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(toastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>
@endsection

