@extends('layouts.survey', ['class' => 'bg-default', 'title' => 'Take Survey'])

@section('content')

<div class="header bg-gradient-primary py-6 py-lg-7">
  <div class="container">
      <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
              <div class="col-lg-7 col-md-8">
                  <h1 class="text-white">{{ $section ? $section->name : 'Survey has been completed' }}</h1>
                  <h3 class="text-white">
                    {{ $section ? 'Section - ' .$section->id : 'Please go to the dashboard' }}
                    <a href="{{ url('/dashboard')}}" class="text-white"><i class="fa fa-external-link-alt"></i> </a>
                  </h3>
              </div>
          </div>
      </div>
  </div>
  <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
  </div>
</div>

<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        @if($section)
        <div class="col-lg-10 col-md-12">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-4 py-lg-4">
                    <form role="form" method="POST" action="{{ '/take-survey' }}">
                        <input type="hidden" name="section_id" value="{{$section->id}}">
                        @include('survey.questions')
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
