@extends('master')

@section('content')
 


<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor">Mainstream</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
			<li class="breadcrumb-item active">Mainstream</li>
		</ol>
	</div>
	
</div>

	<div class="row">
		<div class="card" style="width:100%;">
			<div class="card-body">
				<h4 class="card-title">Hari Ini</h4>
				@include('mainstream/today')
			</div>
		</div>
	</div>
	
<div class="row">
		<div class="card" style="width:100%;">
			<div class="card-body">
				<h4 class="card-title">Statistik</h4>
				<div class="ct-sm-line-chart p-20" style="width:100%;height: 400px;"></div>
			</div>
		</div>
	</div>

<div class="row">
		<div class="card" style="width:100%;">
			<div class="card-body">
				<center><h4 class="card-title">Terbaru</h4></center>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item"> 
						<a class="nav-link active" data-toggle="tab" href="#khof" role="tab">
							<span class="hidden-sm-up"><i class="ti-home"></i></span>
							<span class="hidden-xs-down">Khofifah</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#ipul" role="tab">
							<span class="hidden-sm-up"><i class="ti-user"></i></span>
							<span class="hidden-xs-down">Gus Ipul</span>
						</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content tabcontent-border">
					<div class="tab-pane active p-20" id="khof" role="tabpanel">
						<table data-toggle="table" data-height="250" data-mobile-responsive="true" class="table-striped">
							<thead>
                                <tr>
									<th><center>Judul</center></th>
									<th><center>Media</center></th>
									<th><center>Tayang</center></th>
                                </tr>
                            </thead>
							<tbody>
							@foreach ($khof as $khof)
								<tr>
									<td><a style="font-size:14px;" href={{ $khof['link']['@attributes']['href'] }} target="_blank">{!! $khof['title'] !!}</a></td>
									<td><span style="font-size:12px;">{{ \App\Http\Controllers\MainstreamController::getMedia($khof['link']['@attributes']['href']) }}</span></td>
									<td><span style="font-size:12px;">{{\Carbon\Carbon::createFromTimeStamp(strtotime($khof['published']))->diffForHumans()}}</span></td>
								</tr>
							@endforeach	
							</tbody>
						</table>	
					</div>
					<div class="tab-pane p-20" id="ipul" role="tabpanel">
						<table data-toggle="table" data-height="250" data-mobile-responsive="true" class="table-striped">
							<thead>
                                <tr>
									<th><center>Judul</center></th>
									<th><center>Media</center></th>
									<th><center>Tayang</center></th>
                                </tr>
                            </thead>
							<tbody>
							@foreach ($ipul as $ipul)
								<tr>
									<td><a style="font-size:14px;" href={{ $ipul['link']['@attributes']['href'] }}>{!! $ipul['title'] !!}</a></td>
									<td><span style="font-size:12px;">{{ \App\Http\Controllers\MainstreamController::getMedia($ipul['link']['@attributes']['href']) }}</span></td>
									<td><span style="font-size:12px;">{{\Carbon\Carbon::createFromTimeStamp(strtotime($ipul['published']))->diffForHumans()}}</span></td>
								</tr>
							@endforeach	
							</tbody>
						</table>	
					</div>
				</div>
			</div>
		</div>
</div>


	
<script src="theme/assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="theme/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
	

    
<script>

new Chartist.Line('.ct-sm-line-chart', {
  labels: {!!\App\Http\Controllers\MainstreamController::getDataLabel()!!},
  series: [
    {!!\App\Http\Controllers\MainstreamController::getData(1)!!},{!!\App\Http\Controllers\MainstreamController::getData(2)!!}
  ]
}, {
  fullWidth: true,
  
  plugins: [
    Chartist.plugins.tooltip()
  ],
  chartPadding: {
    right: 40
  }
});


</script>
@endsection
