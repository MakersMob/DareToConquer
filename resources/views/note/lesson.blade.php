@extends('layouts.app', ['title' => $lesson->name])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h3 class="preheader"><a href="/course/{{ $lesson->course->slug }}">{{ $lesson->course->name }}</a></h3>
        <h2 class="preheader">Module {{$lesson->module->order}}: {{ $lesson->module->name}}</h2>
  			<h1>Notes for: {{ $lesson->name }}</h1>
        @role('admin')
          <p><a href="/lessons/{{ $lesson->id }}/edit" class="btn btn-primary">Edit Lesson</a></p>
        @endrole
  		</div>
  	</div>
  </div>
</section>
@if(count($lesson->objectives) > 0)
<section class="content rose objectives">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>Lesson Objectives</h3>
        <ol>
          @foreach($lesson->objectives as $objective)
            <li>{{ $objective->title }}</li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>
</section>
@endif
<section class="content lesson">
  <div class="container">
  	<div class="row">
      <div class="col-12">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="/course/{{ $lesson->course->slug }}/{{ $lesson->slug }}/">Lesson</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="">Notes</a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-8 main">
        {!! $notes->notes !!}
      </div>
    </div>
  </div>
</section>
<section class="content rose">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-8">
        <h2 style="border-bottom: none; margin-top: 0;">{{ $lesson->course->name }} <strong>Curriculum</strong></h2>
  			<table class="table">
          <?php $c = 1; ?>
          @foreach($modules as $module)
            <tr class="section">
              <td colspan="3">Module {{$c}}: {{$module->name}}</td>
            </tr>
            <?php $c++;?>
            <?php $count = 1; ?>
            @if(count($module->less) > 0)
              @foreach($module->less as $less)
                <tr class="lessons @if($less->id == $lesson->id) active @endif">
                  <td>{{ $count }}</td>
                  <td><a href="/course/{{$less->course->slug}}/{{ $less->slug }}">{{ $less->name }}</a> @if($less->active == 0) **DRAFT** @endif @if($less->active == 2) **REVIEW** @endif</td>
                  <td>@if(Auth::user()->lessons->contains($less->id)) &#x2714; @endif</td>
                </tr>
                <?php $count++;?>
              @endforeach
            @endif
          @endforeach
        </table>
  		</div>
  	</div>
  </div>
</section>
@endsection

@section('headScripts')
<script charset="ISO-8859-1" src="https://fast.wistia.com/assets/external/E-v1.js"></script>
@endsection