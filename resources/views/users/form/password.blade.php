<form method="post" action="{{url('dashboard/users/update/password')}}" autocomplete="off">
    <input type="hidden" name="id" value="{{ $user ? $user->id : '' }}">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>
    @if (session('password_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('password_status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="pl-lg-4">
      <input type="hidden" name="form_type" value="password">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
              <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
              <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

              @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
              <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
            </div>
          </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
        </div>
    </div>
</form>
