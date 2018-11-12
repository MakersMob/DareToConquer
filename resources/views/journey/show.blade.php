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
        <table class="table">
          @foreach($journey->stops as $stop)
                <tr class="lessons">
                  <td><a href="/journey/{{$journey->slug}}/{{ $stop->slug }}">{{ $stop->name }}</a> @if($stop->active == 0) **DRAFT** @endif @if($stop->active == 2) **REVIEW** @endif</td>
                  <td>@if(Auth::user()->stops->contains($stop->id)) &#x2714; @endif</td>
                </tr>
          @endforeach
        </table>
    </div>
  </div>
</section>
@endsection