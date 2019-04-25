@extends('layouts.app', ['title' => $stop->name])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="preheader"><a href="/journey/{{ $stop->journey->slug }}">{{ $stop->journey->title}}</a></h3>
				<h1 class="billboard"><strong>{{ $stop->name }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/stop/{{ $stop->id }}/edit" class="btn btn-primary">Edit Stop</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
				{!! $stop->content !!}
			</div>
		</div>
	</div>
</section>
<section class="content vanilla">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				@unless($stop->active != 1)
				  @if(Auth::user()->stops->contains($stop->id))
				    <p>You've completed this Stop but good on you for coming back and revisiting things!</p>
				  @else
				    <p><a href="/stopcompleted/{{$stop->id}}" class="btn btn-block btn-primary btn-lg">I've completed this Stop!</a></p>
				  @endif
				@endunless
				<table class="table">
					<thead>
						<tr>
							<td colspan="2">Journey Stops</td>
						</tr>
					</thead>
				  @foreach($journey->stops as $st)
				        <tr class="lessons">
				          <td><a href="/journey/{{$journey->slug}}/{{ $st->slug }}">{{ $st->name }}</a> @if($st->active == 0) **DRAFT** @endif @if($st->active == 2) **REVIEW** @endif</td>
				          <td>@if(Auth::user()->stops->contains($st->id)) &#x2714; @endif</td>
				        </tr>
				  @endforeach
				</table>
			</div>
		</div>
	</div>
</section>
@endsection