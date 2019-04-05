@extends('layouts.dashboard', ['title' => __('Role Management')])
@section('title', 'Role Management')
@section('content')
@php
$roles = App\Models\Role::get();
@endphp
<div class="container-fluid mt--4"
    style="margin-left: -10px !important;
    margin-right: 45px !important;">
  <div class="text-right  mt--2">
    <a href="{{ url('/dashboard/roles/create') }}" class="btn btn-sm btn-primary">{{ __('Add Role') }}</a>
  </div>
  <div class="row mt-4">
    <div class="card shadow col-12">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">{{ __('Roles') }}</h3>
          </div>
          <div class="col-4 text-right">
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
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Email') }}</th>
                <th scope="col" colspan="2" >Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name }}</td>
                <td>
                  <a class="btn btn-success" href="{{ url('/dashboard/roles/'.$role->id.'/edit') }}"><i class="far fa-edit"></i>Edit</a>
                  <a class="btn btn-danger" href="{{ url('/dashboard/roles/'.$role->id.'/delete') }}" onclick="return confirm('are you sure you want to delete {{ $role->display_name }}?');"><i class="far fa-trash-alt"></i>Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="card-footer py-4">
        <nav class="d-flex justify-content-end" aria-label="...">
          {{-- $role->links() --}}
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection
