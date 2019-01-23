@extends('layouts.app', ['title' => 'Community Newsletters'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><span>Community Newsletters</span></h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul>
					@foreach($newsletters as $newsletter)
						<li><a href="/newsletter/{{$newsletter->id}}">{{ $newsletter->subject}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection