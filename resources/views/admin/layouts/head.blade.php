<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
<meta name="description" content="" />
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin/vendor/fonts/iconify-icons.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendor/css/core.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
@stack('styles')
<script src="{{ asset('admin/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('admin/js/config.js') }}"></script>
