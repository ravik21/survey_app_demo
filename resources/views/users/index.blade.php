@extends('layouts.dashboard', ['title' => __('User Management')])
@section('content')
@php
     $authId = Auth::user()->id;
     $roles = App\Models\Role::get();

@endphp
<div class="container-fluid mt--4"
    style="margin-left: -20px !important;
    margin-right: 30px !important;">
    <div class="text-right mt-2">
      @role('super-admin')
        <a href="{{ url('dashboard/roles/')}}" class="btn btn-sm btn-primary">{{ __('Manage Roles') }}</a>
      @endrole
      <a href="{{ url('/dashboard/users/create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
    </div>
    <div class="card shadow col-12 mt-4">
      <div class="card-header border-0">
          <div class="row align-items-center">
              <div class="col-12">
                  <h3 class="mb-0">{{ __('Users') }}</h3>
              </div>
          </div>
      </div>
      <div class="col-12">
          @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('status') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
          <form class="" action="/dashboard/users">
          <div class="row">
              <div class="col-lg-3">
                <select class="form-control" name="role_id">
                  <option value="">All</option>
                  @foreach ($roles as $role)
                   <option value="{{$role->id}}" {{ ($selected_role == $role->id) ? 'selected' : '' }} >{{$role->display_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-3">
                <input type="text" name="name" value="" placeholder="Search By Name" class="form-control">
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-12">
                    <input type="submit" name="" value="Search" class="btn btn-success">
                    <a href="/dashboard/users"><button type="button" name="button" class="btn btn-danger">Clear</button></a>
                  </div>
                </div>
              </div>
          </div>
        </form>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">{{ __('Name') }}</th>
                  <th scope="col">{{ __('Email') }}</th>
                  @role('super-admin')
                  <th scope="col">Actions</th>
                  @endrole
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                  </td>
                  @role('super-admin')
                  <td>
                    <a class="btn btn-info" href="{{ url('/dashboard/users/'.$user->id.'/login-as') }}">Access Account</a>
                    <a class="btn btn-success" href="{{ url('/dashboard/users/'.$user->id.'/edit') }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('/dashboard/users/'.$user->id.'/delete') }}" onclick="return confirm('are you sure you want to delete {{ $user->name }}?');">Delete</a>
                  </td>
                  @endrole
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
      <div class="card-footer py-4">
          <nav class="d-flex justify-content-end" aria-label="...">
              {{-- $users->links() --}}
          </nav>
      </div>
    </div>
</div>

@endsection
