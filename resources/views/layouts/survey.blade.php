<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Survey App Demo') }}</title>
        <link href="{{ asset('assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        <div class="main-content">
          @php
              $profile = Auth::user()->profile;
              $avatar = '';

              if ($profile && $profile->avatar) {
                  $avatar = asset($profile->avatar);
              }

          @endphp
          <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
              <div class="container-fluid">
                  <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">{{ $title ? $title : __('Dashboard') }}</a>
                  <ul class="navbar-nav align-items-center d-none d-md-flex">
                      <li class="nav-item dropdown">
                          <a class="nav-link pr-0" href="/dashboard">
                              <div class="media align-items-center">
                                  <span class="avatar avatar-sm rounded-circle" title="Dashboard">
                                      <img alt="Dashboard" src="{{ $avatar ? $avatar : asset('assets/img/theme/avatar.png') }}">
                                  </span>
                              </div>
                          </a>
                      </li>
                  </ul>
              </div>
          </nav>
          @yield('content')
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        @yield('extra_scripts')
        @stack('js')>
    </body>
</html>
