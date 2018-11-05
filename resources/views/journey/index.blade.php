@extends('layouts.app', ['title' => 'Business Journeys'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">DTC Journeys</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul>
					@foreach($journeys as $journey)
						<li><a href="/journey/{{ $journey->slug }}">{{ $journey->name }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>	
@endsection