<!DOCTYPE html>
<html lang="fa" dir="rtl">

    <head>
        @include('admin.layouts.head-tag')
        @yield('head-tag')
    </head>
    <body>
        @include('admin.layouts.header')

        <main class="body-container mt-5">
            <div class="row flex-row-reverse">
                @include('admin.layouts.sidebar')

                <div class="bodySection col-12 col-md-9 mt-5">
                    @yield('content')   
                </div>
            </div>
        </main>
        @include('admin.layouts.scripts')
        @yield('script')
        <section class="toast-wrapper flex-row-reverse">
            @include('admin.alerts.toast.success')
            @include('admin.alerts.toast.error')
        </section>
       
        @include('admin.alerts.sweetalert.success')
        @include('admin.alerts.sweetalert.error')
    </body>

</html>