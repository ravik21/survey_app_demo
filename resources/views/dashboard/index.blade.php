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
              <h2 class="mb-0">Total orders</h2>
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
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Social traffic</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Referral</th>
                <th scope="col">Visitors</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"> Facebook </th>
                <td> 1,480 </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">60%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row"> Facebook </th>
                <td> 5,480 </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">70%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
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
  @if(count($data))
    @foreach ($data as $d)
      questions.push("{{ $d['question'] }}");
      answers.push("{{ $d['answers'] }}");
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
  							callback: (value) => 'Question: ' + value
  						}
  					}]
  				},
  				tooltips: {
  					callbacks: {
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
