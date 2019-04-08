@extends('layouts.app', ['title' => $course->name.' Notes'])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h3 class="preheader"><a href="/course/{{ $course->slug }}">{{ $course->name }}</a></h3>
  			<h1>Notes for: {{ $course->name }}</h1>
  		</div>
  	</div>
  </div>
</section>
<section class="content lesson">
  <div class="container">
  	<div class="row">
      <div class="col-12">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="/course/{{ $course->slug }}">Lessons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="">Notes</a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-8 main">
        @foreach($notes as $note)
          <div class="card" style="margin-bottom: 2rem;">
            <div class="card-header">
              Module {{ $note->module->order }}: {{ $note->module->name}} - Lesson {{$note->lesson->order}}: {{ $note->lesson->name }}
            </div>
            <div class="card-body">
              {!! $note->notes !!}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection

@section('headScripts')
<script charset="ISO-8859-1" src="https://fast.wistia.com/assets/external/E-v1.js"></script>
@endsection