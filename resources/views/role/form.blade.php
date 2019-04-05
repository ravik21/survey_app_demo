@extends('layouts.dashboard', ['title' => __('Add Role')])
@section('content')
@php
  $user = Auth::user();
  $profile = $user ? $user->profile : false;
  $avatar = '';
  if ($profile && $profile->avatar) {
      $avatar = asset($profile->avatar);
  }
@endphp
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row">
            <div class="align-items-center col-6">
              <h3 class="mb-0">{{ __('Roles') }}</h3>
            </div>
            <div class="text-right col-6">
              <a class="btn btn-sm btn-primary" href="{{url('/dashboard/roles') }}">Go Back</a>
            </div>
          </div>
        </div>
        <div class="card-body">

          <h6 class="heading-small text-muted mb-4">Role Information</h6>

          <form method="post" action="{{ url('/dashboard/roles/store') }}" autocomplete="off">
            @csrf
            <div class="pl-lg-10">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="id" value=" {{ ($role) ? $role->id : '' }}">
                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                    <input id="name" class="form-control form-control-alternative" name="name" placeholder="Name" value="{{ ($role) ? $role->name : '' }}" type="text">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="display_name">{{ __('Display Name') }}</label>
                    <input id="display_name" class="form-control form-control-alternative" name="display_name" placeholder="Display Name" value="{{ ($role) ? $role->display_name : '' }}" type="text">
                    @if ($errors->has('display_name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('display_name') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="description">{{ __('Description') }}</label>
                    <textarea name="description" rows="8" cols="87" class="form-control" placeholder="Description">{{ ($role) ? $role->description : '' }}</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              </div>
              <input type="submit" name="" value="Save" class="btn btn-sm btn-success">
            </div>
          </form>
        </div>
    </div>
</div>

<div class="text-center">

</div>

@endsection
