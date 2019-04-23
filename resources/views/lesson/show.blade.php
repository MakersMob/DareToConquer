@extends('layouts.app', ['title' => $lesson->name])

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        <h3 class="preheader"><a href="/course/{{ $lesson->course->slug }}">{{ $lesson->course->name }}</a></h3>
        <h2 class="preheader">Module {{$lesson->module->order}}: {{ $lesson->module->name}}</h2>
  			<h1><strong>{{ $lesson->name }}</strong></h1>
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
      <!--<div class="col-12">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" href="#">Lesson</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/course/{{ $lesson->course->slug }}/{{ $lesson->slug }}/notes" tabindex="-1">Notes</a>
          </li>
        </ul>
      </div>-->
      <div class="col-12 main">
        {!! $lesson->content !!}
      </div>
      <!--<div class="col-lg-5 sidebar">
        <div class="sidebar-item">
          <div class="make-me-sticky">
            <div class="card">
              <div class="card-header">
                Notes
              </div>
              <div class="card-body">
                @if($notes == '')
                  {!! Form::open(['url' => 'notes', 'class' => 'sidebar-form']) !!}
                    <div class="form-group">
                      <textarea class="form-control" name="notes" rows="15"></textarea>
                    </div>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                    <button type="submit" class="btn btn-primary btn-block">Save Notes</button>
                  {!! Form::close() !!}
                @else
                  {!! Form::open(['url' => 'notes/'.$notes->id, 'class' => 'sidebar-form']) !!}
                    @method('PUT')
                    <div class="form-group">
                      <textarea class="form-control" name="notes" rows="15">{{ $note }}</textarea>
                    </div>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                    <button type="submit" class="btn btn-primary btn-block">Save Notes</button>
                  {!! Form::close() !!}
                @endif
              </div>
            </div>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</section>
@if(count($lesson->objectives) > 0)
<section class="content rose objectives">
  <div class="container">
    <div class="row">
      <div class="col-12">
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
<section class="content vanilla">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
          <h3 style="margin-top: 0;">Exercises</h3>
          @foreach($lesson->worksheets as $worksheet)
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-body">
                  @if($answer = $worksheet->worksheetanswered($worksheet->id))
                    <h5 class="worksheet-question" id="worksheet-{{$worksheet->id}}">{{ $worksheet->description}}</h5>
                    {!! $answer->answer !!}
                  @else
                    <div id="worksheet-{{$worksheet->id}}"></div>
                      {!! Form::open(['url' => 'worksheetanswers']) !!}
                        <div class="form-group">
                          <label for="answer" class="">{{ $worksheet->description}}</label>
                          <textarea class="form-control" name="answer" rows="6"></textarea>
                        </div>
                        <input type="hidden" name="worksheet_id" value="{{$worksheet->id}}">
                        <button type="submit" class="btn btn-primary btn-block">Save response</button>
                      {!! Form::close() !!}
                   @endif
                </div>
            </div>
          @endforeach
      </div>
    </div>
  </div>
</section>
@endif
<section class="content lesson">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 style="margin-top: 0;">Questions</h3>
        <p>If you aren't sure about something in the lesson or need some more clarification, then ask a question here and we will make sure it gets answered.</p>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-body">
            {!! Form::open(['url' => 'lessonquestion', 'class' => 'sidebar-form']) !!}
              <div class="form-group">
                <textarea class="form-control" name="question" rows="5" required></textarea>
              </div>
              <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
              <button type="submit" class="btn btn-primary btn-block">Submit Question</button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        @foreach($lesson->questions as $question)
          <div class="lessonquestion">
            <a class="" data-toggle="collapse" id="question-{{ $question->id }}-link" href="#question-{{ $question->id}}" aria-expanded="false" aria-controls="collapseQuestion">{!! $question->question !!}</a>
            <div class="collapse" id="question-{{ $question->id }}">
              <div class="card">
                <div class="card-body">
                  @if($question->answer)
                    {!! $question->answer->answer !!}
                  @else
                    <p>The answer to this question is coming shortly.</p>
                    @role('admin')
                      {!! Form::open(['url' => 'lessonanswer', 'class' => 'sidebar-form']) !!}
                        <div class="form-group">
                          <textarea class="form-control" name="answer" rows="5"></textarea>
                        </div>
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                        <button type="submit" class="btn btn-primary btn-block">Answer Question</button>
                      {!! Form::close() !!}
                    @endrole
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@unless($lesson->active != 1)
<section class="content vanilla">
  <div class="container">
    <div class="row">
  		<div class="col-12 col-lg-6">
        
          @if(Auth::user()->lessons->contains($lesson->id))
            <h3 style="margin-top: 0;">All done!</h3>
            <p>You've completed this lesson but good on you for coming back and revisiting things.</p>
          @else
            <h3 style="margin-top: 0;">Have you completed this lesson?</h3>
            <p><a href="/lessoncompleted/{{$lesson->id}}" class="btn btn-block btn-primary btn-lg">I've completed this lesson!</a></p>
          @endif
       
      </div>
    </div>
  </div>
</section>
 @endunless
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h3 style="border-bottom: none; margin-top: 0;">Curriculum</h3>
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