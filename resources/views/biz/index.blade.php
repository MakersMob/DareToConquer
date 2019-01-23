@extends('layouts.app', ['title' => 'Business Directory at Dare to Conquer', 'description' => 'The businesses that DTC Members are building'])

@section('content')
<section class="welcome biz">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><strong>Member Business Directory</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p><a href="/directory/create" class="btn btn-primary">Add Your Business</a> <a href="/directory/guest-posts" class="btn btn-success">Guest Post Directory</a></p>
						<table class="table small">
							<thead>
								<tr>
									<th>Business</th>
									<th>Owner</th>
									<th>Niches</th>
									<th><a href="/directory/guest-posts">Guest Posts</a></th>
								</tr>
							</thead>
						@foreach($bizs as $biz)
							@if($biz->user->hasrole('pro'))
							<tr>
							<?php $count = count($biz->niches); ?>
								<td>
									@if($biz->guest_post == 1) <!--<span class="float-right badge badge-success" style="margin-right: 10px">Accepts Guest Post</span>--> @endif
									@if($biz->user->hasRole('pro')) <!--<span class="float-right badge badge-primary" style="margin-right: 10px;">Pro Member</span>--> @endif
									@if(count($biz->reports) > 0) <!--<i class="fa fa-money" title="Has income reports" style="margin-right: 10px;"></i>--> @endif 
									<a href="/bizs/{{ $biz->id }}">{{ $biz->name }}</a>
								</td>
								<td><a href="/member/{{ $biz->user->id }}">{{ $biz->user->first_name }} {{ $biz->user->last_name }}</a></td>
								<td>
								@unless($count == 0)
									@foreach($biz->niches as $niche) <span class="badge" style="margin-right: 10px"><a href="/directory/niche/{{$niche->slug}}">{{ $niche->name }}</a></span> @endforeach
								@endunless
								</td>
								<td>@if($biz->guest_post == 1) &#10003; @endif</td>
							</tr>
							@endif
						@endforeach
						</table>
				{{ $bizs->links() }}
			</div>
		</div>
	</div>
</section>
@endsection