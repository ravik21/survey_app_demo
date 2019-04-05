@extends('layouts.dashboard', ['title' => 'Avatar | Upload'])
@section('content')

<div class="col-xl-12 order-xl-1">
  <div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
      <div class="row align-items-center">
        <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
      </div>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data" action="{{ url('dashboard/users/update/'.$type) }}" autocomplete="off">
        <input type="hidden" name="id" value="{{$user->id}}">
        @csrf
        <h6 class="heading-small text-muted mb-4">User {{$type}}</h6>
        @if (\Session::has(''))
        <div class="alert alert-success">
          <strong>{!! \Session::get('') !!}</strong>
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

        <div class="pl-lg-4">
          <input type="hidden" name="form_type" value="{{$type}}">
          <div class="form-group">
            <input type="file" name="{{$type}}" value="" required>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection
