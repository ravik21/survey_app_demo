@if ($errors->has($field))
<span class="has-error" style="color:red" role="alert">
  <strong>{{ $errors->first($field) }}</strong>
</span>
@endif
