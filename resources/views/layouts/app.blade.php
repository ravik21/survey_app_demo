<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Survey App Demo') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        <div class="main-content">
          @auth()
              <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                  @csrf
              </form>
          @endauth
          @include('includes.navbars.navbar')
          @yield('content')
        </div>
        @guest()
        @include('includes.footers.guest')
        @endguest


        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        @yield('extra_scripts')

        @stack('js')>
    </body>
</html>
