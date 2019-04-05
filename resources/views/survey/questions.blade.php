@foreach($section->questions as $key => $question)
<div class="text-muted mb-2">
  <h3>{{++$key}}. {{$question->name}}</h2>
  <!-- <small>{{ __('Please select a suitable option') }}</small> -->
</div>
@csrf
<div class="row mb-4">
  @foreach($question->options as $optionKey => $option)
  <div class="col-md-12 mb-2">
    <div class="custom-control custom-control-alternative custom-checkbox">
      <input class="custom-control-input" name="answers[{{$question->id}}]" id="customCheckLogin_{{$question->id}}_{{$option->id}}" type="{{$option->type}}" value="{{$option->id}}" {{$question->required ? 'required' : ''}}>
      <label class="custom-control-label" for="customCheckLogin_{{$question->id}}_{{$option->id}}">
        <span class="text-muted">{{ __($option->text) }}</span>
      </label>
    </div>
  </div>
  @endforeach
</div>
@endforeach
