@extends('layouts.app', ['title' => $day->title, 'description' => $day->summary])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h2 class="preheader"><a href="/headstart">The 60-Day Headstart</a></h2>
        <h1 class="">{{ $day->title }}</h1>
        @role('admin')
          <p><a href="/headstart/{{ $day->id }}/edit" class="btn btn-primary">Edit Day</a></p>
        @endrole
  		</div>
  	</div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        {!! $day->content !!}
      </div>
    </div>
  </div>
</section>
@endsection