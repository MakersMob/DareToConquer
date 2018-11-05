@extends('layouts.app', ['title' => $journey->name])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h1 class="">{{ $journey->title }}</h1>
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
      <div class="col-12">
        {{ $journey->description }}
      </div>
    </div>
  </div>
</section>
@endsection