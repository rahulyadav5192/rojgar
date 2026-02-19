<!DOCTYPE html>
<html lang="en" class="layout-wide customizer-hide" data-assets-path="{{ asset('admin') }}/" data-template="vertical-menu-template-free">
<head>
    @include('admin.layouts.head')
    <link rel="stylesheet" href="{{ asset('admin/vendor/css/pages/page-auth.css') }}" />
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
