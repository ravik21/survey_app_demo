<h6 class="heading-small text-muted mb-4">Contact information</h6>
<form method="post" action="{{url('dashboard/user/update/basic-profile')}}" autocomplete="off">
  <input type="hidden" name="id" value="{{ $user ? $user->id : '' }}">
  @csrf
  <input type="hidden" name="form_type" value="more_info">
  <div class="pl-lg-4">
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="form-control-label" for="input-address">{{ __('Address') }}</label>
          <input id="input-address" class="form-control form-control-alternative" name="address" placeholder="Home Address" value="{{ ($profile) ? $profile->address : '' }}" type="text">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label" for="input-city">{{ __('City') }}</label>
          <input type="text" id="input-city" class="form-control form-control-alternative" name="city" placeholder="City" value="{{ ($profile) ? $profile->city : '' }}">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label" for="input-country">{{ __('Country') }}</label>
          <input type="text" id="input-country" class="form-control form-control-alternative" name="country" placeholder="Country" value="{{ ($profile) ? $profile->country : '' }}">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label" for="input-country">{{ __('Postal code') }}</label>
          <input type="number" id="input-postal-code" class="form-control form-control-alternative" name="postal_code" placeholder="Postal code" value="{{ ($profile) ? $profile->postal_code : '' }}">
        </div>
      </div>
    </div>
  </div>
</form>
