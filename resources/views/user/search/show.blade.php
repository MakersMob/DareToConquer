@extends('layouts.app')

@section('content')
<section class="welcome food2">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard">{{ ucwords($search) }}</h1>
				<h2 class="linewrap"><span>Search Results</span></h2>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12">
				@if(count($users) == 0)
					<p>Sorry, no results found.</p>
				@else
					<ul>
						@foreach($users as $user)
							<li><a href="/user/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
</section>
@endsection