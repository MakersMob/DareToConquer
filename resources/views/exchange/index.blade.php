@extends('layouts.app', ['title' => 'Member Exchanges'])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Member Exchanges</h1>
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
						@if(Auth::user()->points >= 10)
							<p><a href="/exchange/create" class="btn btn-lg btn-primary btn-block">Post a Task</a></p>
						@else
							<p><strong>To create a task you need 10 points. Complete tasks for other members to earn points.</strong></p>
						@endif
						<ul class="cat-list">
							@foreach($niches as $niche)
								<li><a href="/exchange/niche/{{ $niche->slug }}">{{ $niche->name }}</a></li>
							@endforeach
						</ul>
						<p>The member exchange is a place to help other members grow their blogs by exchanging tasks.</p>
						<p>Currently this is only open to sharing social media activity and commenting on blog posts.</p>
						<p>Each time you complete a task and the blog owner approves it you get a point which in turn allows you to post tasks.</p>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<table class="table exchange">
					<thead>
						<tr>
							<th>Niche</th>
							<th>Type</th>
							<th>Member</th>
							<th>Have You Done This?</th>
						</tr>
					</thead>
					@foreach($exchanges as $ex)
						<?php 
							
							$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $ex->user->email ) ) ); 
						?>
						<tr>
							<td><a href="/exchange/niche/{{ $ex->niche->slug }}">{{ $ex->niche->name }}</a></td>
							<td><a href="/exchange/{{ $ex->id}}">{{ ucwords($ex->type) }}</a></td>
							<td><img src="{{ $grav_url }}" class="avatar" alt="{{ $ex->user->first_name }} {{ $ex->user->last_name }}"> <a href="/member/{{ $ex->user->id }}">{{ $ex->user->first_name }} {{ $ex->user->last_name }}</a></td>
							<td>@if(Auth::user()->id == $ex->user_id) This is your task. @else @if(Auth::user()->tasks->contains('exchange_id', $ex->id)) &#10003; @else <a href="/exchange/{{ $ex->id}}">Get it done.</a> @endif @endif</td>
						</tr>	
					@endforeach
				</table>
				{{ $exchanges->links() }}
			</div>
		</div>
	</div>
</section>
@endsection