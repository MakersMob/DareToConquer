@extends('layouts.app')

@section('content')
<section class="welcome pinterest">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Add New Milestone</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'milestones']) !!}
							<div clas="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" id="description" rows="8"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-block btn-lg">Add Milestone</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection