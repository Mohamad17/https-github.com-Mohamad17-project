@extends('customer.layouts.master-login')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/jquery.countdown.css') }}">
    <title>تأیید ورود</title>
@endsection

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <a href="{{ route('customer.home') }}" class="login-logo">
                <img src="{{ asset('assets/images/logo/4.png') }}" alt="shop logo">
            </a>
            @error('id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <form action="{{ route('customer.auth.login-confirm', $token) }}" method="POST">
                @csrf
                <section class="text-2xl font-bold text-purple-600 mb-3">تأیید ورود</section>
                <section class="text-sm font-bold text-green-600 mb-3">
                    @if ($otp->type == 0)
                        <span>کد تأیید به شماره همراه {{ $otp->login_id }} ارسال شد</span>
                    @else
                        <span>کد تأیید به ایمیل {{ $otp->login_id }} ارسال شد</span>
                    @endif
                </section>
                <section class="login-info">کد تأیید خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" name="confirm-code" value="{{ old('confirm-code') }}">
                    @error('confirm-code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>

                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>
                <section id="resend" class="hidden">
                    <a href="{{ route('customer.auth.login-resend-otp', $token) }}" class="text-lg text-blue-600 ">ارسال
                        مجدد کد ورود</a>
                </section>
                <section id="timer">

                </section>
                <small class="text-red-500"><a href="{{ route('customer.auth.login-register-form') }}"><i
                            class="fa fa-arrow-right"></i> بازگشت</a></small>
            </form>
        </section>
    </section>
@endsection
@section('script')
    @php
    $timer = ((new \Carbon\Carbon($otp->created_at))->addMinutes(5)->timestamp - \Carbon\Carbon::now()->timestamp) * 1000;
    @endphp
    <script>
        var countDownDate = new Date().getTime() + {{ $timer }};
        var timer = $('#timer');
        var resendOtp = $('#resend');

        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (minutes == 0) {
                timer.html(' ارسال مجدد کد تایید تا ' + seconds + 'ثانیه دیگر')
            } else {
                timer.html(' ارسال مجدد کد تایید تا ' + minutes + 'دقیقه و ' + seconds + 'ثانیه دیگر');
            }
            if (distance < 0) {
                clearInterval(x);
                timer.addClass('hidden');
                resendOtp.removeClass('hidden');
            }

        }, 1000)
    </script>
@endsection
