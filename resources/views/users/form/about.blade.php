<h6 class="heading-small text-muted mb-4">{{ __('About Me') }}</h6>
<div class="pl-lg-4">
  <div class="form-group">
    <label class="form-control-label">{{ __('About Me') }}</label>
    <textarea rows="4" class="form-control form-control-alternative" name="about_me" placeholder="A few words...">{{ ($profile) ? $profile->about_me : '' }}</textarea>
  </div>
</div>
