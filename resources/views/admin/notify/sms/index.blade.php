@extends('admin.layouts.master')
@section('head-tag')
    <title>اطلاع رسانی پیامکی</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb font-size-12">
            <li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item"><a href="#">بخش اطلاع رسانی</a></li>
            <li class="breadcrumb-item active" aria-current="page">اطلاع رسانی پیامکی</li>
        </ol>
    </nav>
    <div class="col-md-12 mt-4">
        <div class="content">
            <h4>اطلاع رسانی پیامکی</h4>
            <div class="d-flex justify-content-between align-items-center my-3">
                <a href="{{ route('admin.notify.sms.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه پیامکی </a>
                <input type="text" class="form-controll form-controll-sm form-text" name="search" placeholder="جستجو">
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان اطلاعیه</th>
                            <th scope="col">خلاصه متن</th>
                            <th scope="col">تاریخ ارسال</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col" class="max-width-16rem"><i class="fa fa-cogs mx-1"></i>تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sms as $key => $singleSms)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $singleSms->title }}</td>
                                <td>{{ Str::limit($singleSms->body, 40) }}</td>
                                <td>{{ date_to_persian($singleSms->published_at, 'Y-m-d H:i:s') }}</td>
                                <td>
                                    <label><input id="{{ $singleSms->id }}"
                                            data-url="{{ route('admin.notify.sms.status', [$singleSms->id]) }}"
                                            onchange="changeStatus({{ $singleSms->id }})" type="checkbox"
                                            @if ($singleSms->status == 1) checked @endif></label>
                                </td>
                                <td class="width-16rem">
                                    <a href="{{ route('admin.notify.sms.edit', [$singleSms->id]) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-edit mx-1"></i>ویرایش</a>
                                    <form class="d-inline"
                                        action="{{ route('admin.notify.sms.destroy', [$singleSms->id]) }}" method="POST">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                class="fa fa-trash mx-1"></i>حذف</button>
                                    </form>
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
        function changeStatus(id) {
            var element = $('#' + id);
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
    @include('admin.alerts.sweetalert.delete-confirm', [
        'className' => 'delete',
    ])
@endsection
