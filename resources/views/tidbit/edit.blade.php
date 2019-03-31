@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Edit a Tidbit</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'tidbit/'.$tidbit->id, 'enctype' => 'multipart/form-data']) !!}
							@method('PUT')
							<div class="form-group">
								<label for="content">Content</label>
								<textarea class="form-control" name="content" rows="20"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Update Tidbit</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection