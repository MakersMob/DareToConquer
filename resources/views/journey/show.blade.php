@extends('layouts.app', ['title' => $journey->name])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h2 class="subheader"><a href="/journey">Journeys</a></h2>
        <h1 class="billboard"><strong>{{ $journey->title }}</strong></h1>
        @role('admin')
          <p><a href="/journey/{{ $journey->id }}/edit" class="btn btn-primary">Edit Journey</a></p>
        @endrole
  		</div>
  	</div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        {{ $journey->description }}
      </div>
      <div class="col-12 col-lg-6">
        <ul>
          @foreach($journey->stops as $stop)
            <li><a href="/journey/{{ $journey->slug }}/{{ $stop->slug }}">{{ $stop->name }}</a></li>
          @endforeach
        </ul>
    </div>
  </div>
</section>
@endsection