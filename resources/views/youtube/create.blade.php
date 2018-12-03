@extends('layouts.app')

@section('content')
<section class="welcome course">
  <div class="container">
  	<div class="row">
  		<div class="col-12">
        	<h1>Add YouTube Video</h1>
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
						{!! Form::open(['url' => 'youtube']) !!}
							<div class="form-group">
								<label for="title">Title</label>
								<input class="form-control" type="text" name="title" id="title" required>
							</div>
							<div class="form-group">
								<label for="youtube_id">YouTube ID</label>
								<input class="form-control" type="youtube_id" name="youtube_id" id="youtube_id" required>
							</div>
							<button type="submit" class="btn btn-lg btn-primary">Add YouTube</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection