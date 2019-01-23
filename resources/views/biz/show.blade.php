@extends('layouts.app', ['title' => $biz->name.' in Billionaire Biz Directory'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12 columns">
				<h2 class="preheader"><a href="/directory">Business Directory</a></h2>
				<h1>{{ $biz->name }}</h1>
				<h3 class="subheader">by <a href="/member/{{ $biz->user->id}}">{{ $biz->user->first_name }} {{ $biz->user->last_name }}</a></h3>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				@if($biz->guest_post == 1)
					<div class="card" style="margin-bottom: 1rem;">
						<div class="card-header">
							This biz accepts guest posts.
						</div>
						<div class="card-body">
							{!! $biz->guest_post_description !!}
						</div>
					</div>
				@endif
				<div class="card" style="margin-bottom: 1rem;">
					<div class="card-header">
						The Why
					</div>
					<div class="card-body">
						@if($biz->description == '')
							<p>No Why has been added yet but it is probably a great biz.</p>
						@else
							{!! $biz->description !!}
						@endif
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3 sidebar">
				<p><a href="{{ $biz->url }}?ref=billionairebizclub.com" rel="nofollow" target="_blank" class="btn btn-info btn-block">Visit biz &#8594;</a></p>
				@if(count($biz->niches) > 0)
					<div class="card" style="margin-bottom: 1rem;">
						<div class="card-header">
							Niches
						</div>
						<div class="card-body" style="padding: 0;">
							<ul class="list-unstyled reports-list">
							@foreach($biz->niches as $niche)
								<li class=""><a href="/directory/niche/{{ $niche->slug }}">{{ $niche->name }}</a></li>
							@endforeach
							</ul>
						</div>
					</div>
				@endif
				@if($biz->user_id == 32)
					<p><em>Is this your biz? Want to edit its info and add future income reports? All you need to do is sign up for a <a href="/register">free account</a> and <a href="/claim/{{ $biz->id}}">claim it</a>.</em></p>
				@endif
				@if(Auth::check() AND $biz->user_id != Auth::user()->id)
					@if(Auth::user()->subscriptions->contains('biz_id', $biz->id))
						<p><a href="/subscription/{{ $biz->id }}/delete" class="btn-primary btn btn-block">Unfollow This biz</a></p>
					@else
						{!! Form::open(['url' => 'subscription', 'style' => 'margin-bottom: 1rem;']) !!}
							<input type="hidden" name="biz_id" value="{{ $biz->id }}">
							<button type="submit" class="btn btn-primary btn-block">Follow This biz</button>
						{!! Form::close() !!}
					@endif
				@endif
				@unless(Auth::guest())
					@if(Auth::user()->id == $biz->user_id)
						<div class="card" style="margin-bottom: 1rem;">
							<div class="card-header">
								Owner Stuff
							</div>
							<div class="card-body" style="padding: 0;">
								<ul class="list-unstyled links-list">
									<li class=""><a href="/directory/{{ $biz->id }}/edit">Edit biz Info</a></li>
								</ul>
							</div>
						</div>
					@endif
				@endunless
				<div class="card" style="margin-bottom: 1rem;">
					<div class="card-header border-bottom-0">
						Info
					</div>
					<div class="card-body" style="padding: 0;">
						<ul class="links-list list-unstyled">
							@if($biz->url != '')<li class="justify-content-between"><a target="_blank" href="{{ $biz->url}}" target="_blank" rel="nofollow">Website</a><i class="fa fa-window-maximize"></i></li>@endif
							@if($biz->twitter != '')<li class="justify-content-between"><a target="_blank" href="http://twitter.com/{{$biz->twitter}}" target="_blank">Twitter</a><i class="fa fa-twitter"></i></li>@endif
							@if($biz->facebook != '')<li class="justify-content-between"><a target="_blank" href="{{$biz->facebook}}">Facebook</a><i class="fa fa-facebook"></i></li>@endif
							@if($biz->instagram != '')<li class="justify-content-between"><a target="_blank" href="http://instagram.com/{{$biz->instagram}}">Instagram</a><i class="fa fa-instagram"></i></li>@endif
							@if($biz->pinterest != '')<li class="justify-content-between"><a target="_blank" href="http://pinterest.com/{{$biz->pinterest}}">Pinterest</a><i class="fa fa-pinterest"></i></li>@endif
						</ul>	
					</div>
				</div>		
			</div>
		</div>
	</div>
</section>
@endsection