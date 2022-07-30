<!doctype html>
<html lang="fa" dir="rtl">

<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    <!-- start header -->
    <header class="header mb-4">
        @include('customer.layouts.top-header')
        @include('customer.layouts.menu')
    </header>
    <!-- end header -->

    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
    @yield('content')
    </main>
    <!-- end main one col -->

     <!-- start body -->
     <section class="container-xxl body-container">
        <aside id="sidebar" class="sidebar">

        </aside>
        <main id="main-body" class="main-body">

        </main>
    </section>  
    <!-- end body -->

    <footer class="footer">
        @include('customer.layouts.footer')
    </footer>
    @include('customer.layouts.scripts')
    @yield('script')
    <section class="toast-wrapper flex-row-reverse position-fixed p-3" style="z-index: 909999999; left: 0; top: 3rem; width: 26rem; max-width: 80%;">
        @include('customer.alerts.toast.success')
        @include('customer.alerts.toast.error')
    </section>
   
    @include('customer.alerts.sweetalert.success')
    @include('customer.alerts.sweetalert.error')
</body>

</html>
