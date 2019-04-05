<form method="post" action="{{ url('dashboard/users/update') }}" autocomplete="off">
    <input type="hidden" name="id" value="{{ $user ? $user->id : '' }}">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

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

    <div class="pl-lg-4">
        <input type="hidden" name="form_type" value="basic_info">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label" for="input-username">{{ __('Username') }}</label>
              <input type="text" name="username" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ ($user) ? $user->username : '' }}">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label" for="input-email">{{ __('Email address') }}</label>
              <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email address" value="{{ ($user) ? $user->email : '' }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ ($user) ? $user->name : '' }}" required autofocus>
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
          </div>
          
          <div class="col-lg-6">
            <div class="form-group">
              <label class="form-control-label" for="input-age">{{ __('Age') }}</label>
              <input type="text" name="age" id="input-age" class="form-control form-control-alternative" placeholder="Age" value="{{ ($user) ? $user->age : '' }}">
            </div>
          </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>
