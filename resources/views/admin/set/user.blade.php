@extends('layouts.app', ['title' => $set->title])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader"><a href="/challenge/{{ $set->challenge->id }}">{{ $set->challenge->title}}</a></h2>
				<h1 class="billboard"><strong>{{ $set->title }}</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/set/{{ $set->id }}/edit" class="btn btn-primary">Edit Set</a>  <a href="/admin/set/{{ $set->id }}" class="btn btn-secondary">Admin</a></div>
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
						@foreach($answers as $answer)
							@if($answer->exercise_id == $exercise->id)
								<div class="answer">
									<p><em>They wrote...</em></p>
									{!! $answer->answer !!}
								</div>
								@if($answer->feedback)
									<div class="feedback">
										<p><em>Scrivs says...</em></p>
										{!! $answer->feedback->feedback !!}
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
							@endif
						@endforeach
					</div>
					<?php $count++; ?>
				@endforeach
				{!! Form::open(['url' => 'admin/set/feedbackcompleted', 'enctype' => 'multipart/form-data']) !!}
					<input type="hidden" name="user_id" value="{{ $user->id}}">
					<input type="hidden" name="set_id" value="{{ $set->id}}">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Feedback Completed</button>
				{!! Form::close() !!}
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