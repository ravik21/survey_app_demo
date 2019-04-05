@extends('layouts.dashboard', ['title' => auth()->user()->name ])

@section('content')
@php
    $profile = Auth::user()->profile;
    $avatar = '';
    if ($profile && $profile->avatar) {
        $avatar = asset($profile->avatar);
    }
@endphp
    <div class="col-xl-12 order-xl-1 mt-3">

        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="align-items-center">
                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                </div>
            </div>
            <div class="card-body row">
              <div class="col-xl-12">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                  <strong>{!! \Session::get('success') !!}</strong>
                </div>
                @endif

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
              </div>
              <div class="col-xl-6 col-md-12">
                @include('users.form.email')
              </div>
              <div class="col-xl-6 col-md-12">
                @include('users.form.password')
              </div>
              <hr class="my-6" />
            </div>
        </div>
    </div>
@endsection
