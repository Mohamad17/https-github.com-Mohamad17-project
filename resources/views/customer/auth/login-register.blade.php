@extends('customer.layouts.master-login')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.countdown.css') }}">
    <title>ورود / ثبت نام</title>
@endsection

@section('content')
    <section class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper mb-5">
            <a href="{{ route('customer.home') }}" class="login-logo">
                <img src="{{ asset('assets/images/logo/4.png') }}" alt="shop logo">
            </a>
            @error('token')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <form action="{{ route('customer.auth.login-register') }}" method="POST">
                @csrf
                <section class="text-2xl font-bold text-purple-600">ورود / ثبت نام</section>
                <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" name="id" value="{{ old('id') }}">
                    @error('id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </section>
                <section class="login-btn d-grid g-2"><button class="btn btn-danger">ورود به آمازون</button></section>
                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
                </section>
            </form>
        </section>
    </section>
@endsection
