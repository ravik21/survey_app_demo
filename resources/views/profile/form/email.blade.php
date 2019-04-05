<form method="post" action="{{ url('dashboard/profile/update') }}" autocomplete="off">
    @csrf
    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
    <div class="pl-lg-4">
        <input type="hidden" name="form_type" value="basic_info">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label class="form-control-label" for="input-email">{{ __('Email address') }}</label>
              <input type="email" name="email" id="input-email" class="form-control form-control-alternative" placeholder="Email address" value="{{ ($user) ? $user->email : '' }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
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
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
        </div>
    </div>
</form>
