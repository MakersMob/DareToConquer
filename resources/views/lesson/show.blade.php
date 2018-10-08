@extends('layouts.app', ['title' => $lesson->name])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h3 class="preheader"><a href="/courses/{{ $lesson->course->slug }}">{{ $lesson->course->name }}</a></h3>
        <h2>Module {{$lesson->module->order}}: {{ $lesson->module->name}}</h2>
  			<h1>{{ $lesson->name }}</h1>
        @role('admin')
          <p><a href="/lessons/{{ $lesson->id }}/edit" class="btn btn-primary">Edit Lesson</a></p>
        @endrole
  		</div>
  	</div>
  </div>
</section>
@if(count($lesson->objectives) > 0)
<section class="content smoke objectives">
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
        {!! $lesson->content !!}
      </div>
    </div>
  </div>
</section>
@if(count($lesson->objectives) > 0)
<section class="content smoke objectives">
  <div class="container">
    <div class="row">
      <div class="col-12 justify-content-center">
        <h3>Lesson Objectives Recap</h3>
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
@if(count($lesson->worksheets) > 0)
<section class="content ocean">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
          <h3 style="margin-top: 0;">{{ $lesson->name }} <strong>Exercises</strong></h3>
          @foreach($lesson->worksheets as $worksheet)
            <div class="card">
                <div class="card-body">
            @if($answer = $worksheet->worksheetanswered($worksheet->id))
              <h5 class="worksheet-question text-center" id="worksheet-{{$worksheet->id}}">{{ $worksheet->description}}</h5>
              {!! $answer->answer !!}
            @else
              <div id="worksheet-{{$worksheet->id}}"></div>
                  {!! Form::open(['url' => 'worksheetanswers']) !!}
                    <div class="form-group">
                      <label for="answer" class="text-center"><strong>{{ $worksheet->description}}</strong></label>
                      <textarea class="form-control" name="answer" rows="6"></textarea>
                    </div>
                    <input type="hidden" name="worksheet_id" value="{{$worksheet->id}}">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Save response</button>
                  {!! Form::close() !!}
                </div>
              </div>
            @endif
                </div>
            </div>
          @endforeach
      </div>
    </div>
  </div>
</section>
@endif
<section class="content rose">
  <div class="container">
    <div class="row justify-content-center">
  		<div class="col-12 col-lg-8">
        @if(Auth::user()->lessons->contains($lesson->id))
          <p>You've completed this lesson but good on you for coming back and revisiting things!</p>
        @else
          <p><a href="/lessoncompleted/{{$lesson->id}}" class="btn btn-block btn-primary btn-lg">I've completed this lesson!</a></p>
        @endif
        <h2 style="border-bottom: none;">{{ $lesson->course->name }} <strong>Curriculum</strong></h2>
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
                  <td><a href="/courses/{{$less->course->slug}}/{{ $less->slug }}">{{ $less->name }}</a></td>
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