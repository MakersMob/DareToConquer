@extends('layouts.app', ['title' => 'Dare To Conquer Milestone: '.$milestone->name])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/milestones">Business Milestones</a></h2>
				<h1 class="billboard"><strong>{{ $milestone->name }}</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-body">
						{!! $milestone->description !!}
					</div>
				</div>
				@unless(Auth::user()->milestones->contains($milestone->id))
					{!! Form::open(['url' => 'milestonecompleted', 'style' => 'margin-bottom: 2rem;']) !!}
						<input type="hidden" name="milestone_id" value="{{ $milestone->id }}">
						<button type="submit" class="btn btn-primary btn-block btn-lg">I&rsquo;ve Completed the Milestone</button>
					{!! Form::close() !!}
				@endunless
			</div>
			<div class="col-12 col-lg-6">
				<h3 style="margin-top: 0;">Wall of Fame</h3>
				<ul class="avatar-list list-unstyled">
					@foreach($milestone->users as $user)
						<?php 
							$grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ); 
						?>
						<li><a href="/member/{{ $user->id }}" title="{{ $user->first_name }}"><img src="{{ $grav_url }}" class="avatar-image" alt="{{ $user->first_name }} {{ $user->last_name }}"></a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection