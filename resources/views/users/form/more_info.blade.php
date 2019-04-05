<form method="post" action="{{url('dashboard/users/update/basic-profile')}}" autocomplete="off">
    @csrf
    <input type="hidden" name="id" value="{{ $user ? $user->id : '' }}">
    <h6 class="heading-small text-muted mb-4">Eduction and Current Employment Details</h6>
    <div class="pl-lg-4">
        <input type="hidden" name="form_type" value="more_info">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
              <label class="form-control-label" for="company">Currently Working For</label>
              <input type="text" name="company" id="company" class="form-control form-control-alternative{{ $errors->has('company') ? ' is-invalid' : '' }}" placeholder="Company name" value="{{ ($profile) ? $profile->company : '' }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group{{ $errors->has('designation') ? ' has-danger' : '' }}">
              <label class="form-control-label" for="designation">Designation</label>
              <input type="text" name="designation" id="designation" class="form-control form-control-alternative{{ $errors->has('designation') ? ' is-invalid' : '' }}" placeholder="Designation" value="{{ ($profile) ? $profile->designation : '' }}" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-control-label" for="education">Education</label>
              <input type="text" name="education" id="education" class="form-control form-control-alternative" placeholder="Education" value="{{ ($profile) ? $profile->education : '' }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label class="form-control-label" for="location">Location</label>
              <input type="text" name="location" id="status" class="form-control form-control-alternative" placeholder="Location" value="{{ ($profile) ? $profile->location : '' }}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label class="form-control-label" for="status">Status</label>
            <textarea rows="4" type="text" name="status" id="status" class="form-control form-control-alternative" placeholder="Status">{{ ($profile) ? $profile->status : '' }}</textarea>
        </div>
        <hr class="my-4" />
        <div class="m-negative-20">
          @include('users.form.about')
        </div>
        <hr class="my-4" />
        <div class="m-negative-20">
          @include('users.form.contact_info')
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">Update Profile</button>
        </div>
    </div>
</form>
