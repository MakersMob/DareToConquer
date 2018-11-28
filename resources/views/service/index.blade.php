@extends('layouts.app', ['title' => 'Member Services'])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><strong>Member Services Directory</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4 sidebar">
				<div class="card">
					<div class="card-body">
						<p><a href="/service/create" class="btn btn-lg btn-primary btn-block">Post a Service</a></p>
						<p>The Member Services Directory is a place to offer paid services to other members.</p>
						<p>Marybeth and I are not responsible for bad service. We are not the middleman and middlewoman.</p>
						<p>It's on you to do your due diligence and handle all payment arrangements.</p>
						<p>If you have a complaint about a Member and the Service they provided, you can contact us but only so that we can decide if the Service should be removed from the directory.</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<table class="table data">
					<thead>
						<tr>
							<th>Member</th>
							<th>Service</th>
						</tr>
					</thead>
					@foreach($services as $ser)
						<?php 
							$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $ser->user->email ) ) ); 
						?>
						<tr>
							<td><img class="avatar" src="{{ $grav_url }}" class="avatar-image" alt="{{ $ser->user->first_name }} {{ $ser->user->last_name }}"> <a href="/member/{{ $ser->user->id }}">{{ $ser->user->first_name }} {{ $ser->user->last_name }}</a></td>
							<td><a href="/service/{{ $ser->id }}">{{ $ser->name }}</a></td>
						</tr>	
					@endforeach
				</table>
				{{ $services->links() }}
			</div>
		</div>
	</div>
</section>
@endsection