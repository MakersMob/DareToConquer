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
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul>
					@foreach($guides as $guide)
						<li><a href="/guide/{{ $guide->slug }}">{{ $guide->title }}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection