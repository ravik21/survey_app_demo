@extends('layouts.dashboard', ['title' => $user ? $user->name : 'Add User' ])

@section('content')
@php
    $profile = $user ? $user->profile : false;
    $avatar = '';
    if ($profile && $profile->avatar) {
        $avatar = asset($profile->avatar);
    }

@endphp
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="align-items-center">
                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                </div>
            </div>
            <div class="card-body">
                @include('users.form.email')
                <hr class="my-4" />
                @include('users.form.password')
                <hr class="my-4" />
                @include('users.form.more_info')
            </div>
        </div>
    </div>
    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
      <div class="card card-profile shadow">
        <div class="row justify-content-center">
          <div id="avatar" class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <img id="user-avatar" alt="" src="{{ $avatar ? $avatar : asset('assets/img/theme/avatar.png') }}"
              class="rounded-circle">
            </div>
            <div class="col-sm-2">
              <a href="{{ url('dashboard/users/'.($user ? $user->id . '/' : '').'avatar/upload') }}" class="btn btn-sm btn-info" id="add-avatar"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <div class="col-sm-2">
              @if($profile && $profile->avatar)
              <a href="{{'/dashboard/users/avatar/'.$profile->user_id.'/delete'}}" onclick="return confirm('Do you really want to delete your Avatar?');" class="btn btn-sm btn-danger" id="delete-avatar"><i class="fa fa-trash" ></i></a>
              @endif
            </div>

          </div>
        </div>

        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
          </div>
        </div>
        <div class="card-body pt-0 pt-md-4">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                <div>
                <span class="heading">22</span>
                <span class="description">{{ __('Friends') }}</span>
              </div>
              <div>
              <span class="heading">10</span>
              <span class="description">{{ __('Photos') }}</span>
            </div>
            <div>
            <span class="heading">89</span>
            <span class="description">{{ __('Comments') }}</span>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center">
      <h3>
        {{ $user ? $user->name : '' }}<span class="font-weight-light">, {{ $user ? $user->age : '' }}</span>
      </h3>
      <div class="h5 font-weight-300">
        <i class="ni location_pin mr-2"></i>{{$profile ? $profile->location : ''}}
      </div>
      <div class="h5 mt-4">
        <i class="ni business_briefcase-24 mr-2"></i>{{ $profile ? $profile->designation : '' }} {{ $profile ? $profile->company : '' }}
      </div>
      <div>
        <i class="ni education_hat mr-2"></i>{{ $profile ? $profile->education : '' }}
      </div>
      <hr class="my-4" />
      <p>{{ $profile ? $profile->status : ''}}</p>
      <!-- <a href="#">{{ __('Show more') }}</a> -->
    </div>
  </div>
</div>
</div>

@endsection
