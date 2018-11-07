<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body class="@yield('body_class')">
    @include('components.header')
    <main class="main-content">
        @yield('content')
    </main>
    @include('components.footer')
    @include('modal.add-to-cart')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@stack('javascripts')
</body>
</html>