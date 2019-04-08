@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>DTC Email Archives</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/archives/create" class="btn btn-primary">Add Archive</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<ul class="no-bullet sans-serif">
					@foreach($archives as $archive)
						<li style="margin-bottom: 1rem;"><a href="/archives/{{ $archive->slug }}" class="question-link">{{ $archive->title }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-12 col-lg-4 sidebar">
				<h4>What the What?</h4>
				<p>This is a collection of emails that I've sent to DTC Members over the years. Not all of them but some of the ones that people have said stick out.</p>
			</div>
		</div>
	</div>
</section>
@endsection