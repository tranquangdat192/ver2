<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layouts.head')
<body class="@yield('body_class')">
    <main class="main-content">
        @yield('content')
    </main>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('javascripts')
</body>
</html>