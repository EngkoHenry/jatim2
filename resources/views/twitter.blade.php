@extends('master')

@section('content')
 


<div class="row page-titles">
	<div class="col-md-5 col-8 align-self-center">
		<h3 class="text-themecolor">Social Media</h3>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="javascript:void(0)">Social Media</a></li>
			<li class="breadcrumb-item active">Twitter</li>
		</ol>
	</div>
	
</div>

	<div class="row">
		<div class="card" style="width:100%;">
			<div class="card-body">
				<h4 class="card-title">Mention Terbaru</h4>
				<table data-toggle="table" data-height="250" data-mobile-responsive="true" class="table-striped">
					<thead>
						<tr>
							<th><center>Username</center></th>
							<th><center>Tweet</center></th>
							<th><center>Go To</center></th>
						</tr>
					</thead>
					<tbody>
					@foreach ($mention as $mention)
						<tr>
							<td><a style="font-size:14px;text-align:center;display:block;" href={{ 'https://twitter.com/'.$mention['user']['screen_name'] }} target="_blank"><img src={{$mention['user']['profile_image_url_https']}}></img><br>{{ $mention['user']['screen_name'] }}</a></td>
							<td><span style="font-size:12px;">{{ $mention['text'] }}</span></td>
							<td><a style="font-size:12px;text-align:center;display:block;" href={{'https://twitter.com/'.$mention['user']['screen_name'].'/status/'.$mention['id_str']}} target="_blank"><i class="mdi mdi-share"></i></a></td>
						</tr>
					@endforeach	
					</tbody>
				</table>
			</div>
		</div>
	</div>
	



@endsection
