@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create an Exercise</h1>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'exercise', 'enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="journey_id">Set</label>
								<select class="form-control" name="set_id" id="set_id">
									@foreach($sets as $set)
										<option value="{{$set->id}}">{{ $set->title }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="exercise">Exercise</label>
								<textarea class="form-control" name="exercise" rows="20"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Create Exercise</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection