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
        <link type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @php
            $profile = Auth::user() ? Auth::user()->profile : false;
            $avatar = '';
            if ($profile && $profile->avatar) {
                $avatar = (file_exists('storage/avatars/'.$profile->avatar)) ? asset('storage/avatars/'.$profile->avatar) : $profile->avatar;
            }
        @endphp
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                @csrf
            </form>
            @include('includes.navbars.sidebar', ['src' => isset($avatar) ? $avatar : ''])
        @endauth

        <div class="main-content">
          @include('includes.navbars.navbar', ['title' => isset($title) ? $title : '' ])
          @auth
          <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{ ($profile && $profile->cover) ? asset($profile->cover): '' }}); background-size: cover; background-position: center top;">
            <span class="mask bg-gradient-default opacity-8"></span>
            <div class="container-fluid d-flex align-items-center mt-4">
              <div class="row" style="width:100%">
                <div class="col-md-6">
                  <h1 class="display-2 text-white">Hello {{auth()->user()->name}}</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;min-height:45px;">
                  <a href="{{ url('dashboard/profile/cover/upload') }}" class="btn btn-sm btn-success cover-btn"><i class="fa fa-plus"></i></a>
                  @if($profile && $profile->cover)
                  <a href="{{ url('dashboard/profile/cover/'.$profile->user_id.'/delete') }}" onclick="return confirm('Do you really want to delete your Cover?');" class="btn btn-sm btn-danger cover-btn"><i class="fa fa-trash" ></i></a>
                  @endif
                </div>
                <div class="row col-md-12 col-xs-10">
                  @include('includes.headers.cards')
                </div>
              </div>
            </div>
          </div>
          @endauth
          <div class="container-fluid mt--10">
            <div class="row">
              <div class="container-fluid mt--6" style="padding:0!important;">
                <div class="col row">
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        @yield('extra_scripts')
        @stack('js')
        <script src="{{ asset('assets/js/app.js') }}"></script>
</html>
