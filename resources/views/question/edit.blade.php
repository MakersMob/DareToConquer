@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="preheader">Editing</h2>
				<h1>{{ $question->question }}</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'questions/'.$question->id, 'method' => 'patch', 'class' => 'callout']) !!}
							<div class="form-group">
								<label for="question">Question</label>
								<input class="form-control" type="text" name="question" id="question" value="{{$question->question}}">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<input class="form-control" type="text" name="description" id="description" value="{{$question->description}}">
							</div>
							<div class="form-group">
								<label for="answer">Answer</label>
								<textarea class="form-control" name="answer" rows="50">{{$question->answer}}</textarea>
							</div>
							<button type="submit" class="btn btn-large btn-block btn-primary">Update Question</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection