@extends('layouts.app', ['title' => 'Guest Post Directory'])

@section('content')
<section class="welcome blog">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/directory">Business Directory</a></h2>
				<h1><strong>Guest Post Directory</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>Want to add your Business to this directory? Then either <a href="/directory/create">add your Business</a> or edit your Business to add the guest post criteria.</p>
				<table class="table small">
							<thead>
								<tr>
									<th>Business</th>
									<th>Owner</th>
									<th>Niches</th>
									<th><a href="/directory/guest-posts">Accepts Guest Posts</a></th>
								</tr>
							</thead>
						@foreach($bizs as $biz)
							<tr>
							<?php $count = count($biz->niches); ?>
								<td>
									@if($biz->guest_post == 1) <!--<span class="float-right badge badge-success" style="margin-right: 10px">Accepts Guest Post</span>--> @endif
									@if($biz->user->hasRole('pro')) <!--<span class="float-right badge badge-primary" style="margin-right: 10px;">Pro Member</span>--> @endif
									<a href="/directory/{{ $biz->id }}">{{ $biz->name }}</a>
								</td>
								<td>{{ $biz->user->first_name }} {{ $biz->user->last_name }}</td>
								<td>
								@unless($count == 0)
									@foreach($biz->niches as $niche) <span class="badge" style="margin-right: 10px"><a href="/directory/niche/{{$niche->slug}}">{{ $niche->name }}</a></span> @endforeach
								@endunless
								</td>
								<td>@if($biz->guest_post == 1) &#10003; @endif</td>
							</tr>
						@endforeach
						</table>
			</div>
		</div>
	</div>
</section>
@endsection