@extends('layouts.app', ['title' => 'Blogging Milestones'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Business Milestones</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<table class="table">
					<thead>
						<tr>
							<th>Milestone Name</th>
							<th>Completions</th>
						</tr>
					</thead>
					@foreach($milestones as $milestone)
						<tr>
							<td><a href="/milestones/{{ $milestone->id }}">{{ $milestone->name }}</a></td>
							<td>{{ count($milestone->users) }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="col-12 col-lg-6">
				<p>Business Milestones are meant to help you set goals for your business that you can achieve in a way that doesn't make you think that you need 100,000 pageviews on day 1.</p>
				<p>This is a journey and it's important that you understand the different milestones that you reach as you move along the journey.</p>
				<p>Once you&rsquo;ve completed a milestone, go into the milestone and mark it as complete.</p>
				<p><strong>These milestones are in no particular order.</strong></p>
			</div>
		</div>
	</div>
</section>
@endsection