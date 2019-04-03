@extends('layouts.app', ['title' => $set->title])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/challenge/{{ $set->challenge->id }}">{{ $set->challenge->title}}</a></h2>
				<h1 class="billboard"><strong>{{ $set->title }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/set/{{ $set->id }}/edit" class="btn btn-primary">Edit Set</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-5">
				{!! $set->description !!}
			</div>
			<div class="col-12 col-lg-7 main">
				<?php $count = 1; ?>
				@foreach($set->exercises as $exercise)
					<div class="exercise" id="exercise-{{ $exercise->id }}">
						<h3>Exercise {{ $count }}</h3>
						<div class="exercise-instructions">
							{!! $exercise->exercise !!}
						</div>
						@if($answer = $exercise->exerciseAnswered($exercise->id))
							<div class="answer">
								<p><em>You wrote...</em></p>
								{!! $answer->answer !!}
							</div>
							@if($feedback = $answer->feedbackReceived($answer->id))
								<div class="feedback">
									<p><em>Scrivs says...</em></p>
									{!! $feedback->feedback !!}
								</div>
							@else
								@hasrole('admin')
									{!! Form::open(['url' => 'feedback', 'enctype' => 'multipart/form-data']) !!}
										<div class="form-group">
											<label for="feedback">Feedback</label>
											<textarea class="form-control" name="feedback" rows="8"></textarea>
											<input type="hidden" name="answer_id" value="{{ $answer->id }}">
										</div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Provide Feedback</button>
									{!! Form::close() !!}
								@endhasrole
							@endif
						@else
							<div class="card">
								<div class="card-body">
									{!! Form::open(['url' => 'answer', 'enctype' => 'multipart/form-data']) !!}
										<div class="form-group">
											<textarea class="form-control" name="answer" rows="8"></textarea>
											<input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
										</div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Save Answer</button>
									{!! Form::close() !!}
								</div>
							</div>
						@endif
					</div>
					<?php $count++; ?>
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="content rose">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<table class="table">
				  @foreach($sets as $st)
				        <tr class="lessons">
				          <td><a href="/challenge/{{$set->challenge->id}}/set/{{$set->id}}">{{ $st->title }}</a> @if($st->status == 0) **DRAFT** @endif @if($st->status == 2) **REVIEW** @endif</td>
				        </tr>
				  @endforeach
				</table>
			</div>
		</div>
	</div>
</section>
@endsection