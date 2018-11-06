@extends('layouts.app', ['title' => 'Online Business Help Guides'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Online Business Help Guides</strong></h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			@foreach($guides as $guide)	
				<div class="col-12 col-lg-4">
					<div class="card mb-3">
						<div class="card-header">
							<a href="/guide/{{ $guide->slug }}">{{ $guide->title }}</a>
						</div>
						<div class="card-body">
							<p>{{ $guide->summary }}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
@endsection