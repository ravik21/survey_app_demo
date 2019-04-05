@extends('layouts.dashboard', ['title' => 'Dashboard'])
@section('content')
<div class="col-xl-12">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
              <h2 class="mb-0">Survey stat</h2>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="questions-chart" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/vendor/chart-js/dist/Chart.min.js') }}"></script>
@endpush

@section('extra_scripts')
<script>
  const questions = [];
  const answers = [];
  let titles = [];
  @if(count($data))
    @foreach ($data as $d)
      questions.push("{{ $d['question_id'] }}");
      answers.push("{{ $d['answers'] }}");
      titles["Question: {{ $d['question_id'] }}"] = "{{ $d['question_title'] }}";
    @endforeach
  @endif

  (function() {
  	var $chart = $('#questions-chart');
  	function initChart($chart)
    {
		    var ordersChart = new Chart($chart, {
  			type: 'bar',
  			options: {
  				scales: {
  					yAxes: [{
  						ticks: {
  							callback: (value) => value
  						}
  					}],
  					xAxes: [{
  						ticks: {
  							callback: (value) => 'Question: ' + value,
              }
  					}]
  				},
  				tooltips: {
  					callbacks: {
              title: function(item, data) {
                return titles[item[0].label];
              },
              label: function(item, data) {
                var label = data.datasets[item.datasetIndex].label || '';
  							var yLabel = item.yLabel;
                var content = '';
                if (data.datasets.length > 1) {
                	content += '<span class="popover-body-label mr-auto"> ' + label + '</span>';
  							}
	              content += '<span class="popover-body-value">' + yLabel + '</span>';
  							return content;
  						}
  					}
  				}
  			},
  			data: {
  				labels: questions,
  				datasets: [{ label: 'Answers', data: answers }],
  			}
  		});

  		$chart.data('chart', ordersChart);
  	}
  	if ($chart.length) {
		  initChart($chart);
  	}
  })();
</script>
@endsection
