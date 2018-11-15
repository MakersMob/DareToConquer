@extends('layouts.app', ['title' => 'Create Niche'])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Create a Niche</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-body">
						{!! Form::open(['url' => 'niche']) !!}
							<div class="form-group">
								<label for="name">Niche</label>
								<input type="text" name="name" id="name" class="form-control" required>
							</div>
							<button type="submit" class="btn btn-primary">Create Niche</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection