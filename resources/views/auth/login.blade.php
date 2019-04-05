@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

@include('includes.headers.guest')

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-header bg-transparent pb-3">
                    <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                    <div class="btn-wrapper text-center">
                        <a href="{{ url('/login-via/google') }}" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon"><img src="{{ asset('assets/img/icons/common/google.svg') }}"></span>
                            <span class="btn-inner--text hidden-md">{{ __('Google') }}</span>
                        </a>
                    </div>
                </div>
                <div class="card-body px-lg-4 py-lg-4">
                    <div class="text-center text-muted mb-4">
                        <small>{{ __('Or sign in with credentials') }}</small><br>
                        <small>You can use <strong>admin@surveyapp.com</strong> and <strong>secret</strong> to login</small>
                    </div>
                    <form role="form" method="POST" action="{{ route('login') }}">
                        @csrf

                        @if (\Session::has('social-msg'))
                              <div class="alert alert-danger">
                                    <strong>{!! \Session::get('social-msg') !!}</strong>
                              </div>
                        @endif
                        @if (\Session::has('fail'))
                              <div class="alert alert-danger">
                                    <strong>{!! \Session::get('fail') !!}</strong>
                              </div>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password">
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheckLogin">
                                <span class="text-muted">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-right">
                    <a href="{{ route('register') }}" class="text-light">
                        <small>{{ __('Create new account') }}</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
