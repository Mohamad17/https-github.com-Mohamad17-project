<!doctype html>
<html lang="fa" dir="rtl">

<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    @yield('content')
    @include('customer.layouts.scripts')
    @yield('script')
</body>

</html>
