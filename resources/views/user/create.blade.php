@extends('layouts.app', ['title' => 'Add a Member'])

@section('content')
<section class="welcome pinterest">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Add a Member</h1>
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
						@hasrole('admin')
						{!! Form::open(['url' => 'user']) !!}
							<div clas="form-group">
								<label for="first_name">First Name</label>
								<input class="form-control" type="text" name="first_name" id="first_name">
							</div>
							<div clas="form-group">
								<label for="last_name">Last Name</label>
								<input class="form-control" type="text" name="last_name" id="last_name">
							</div>
							<div clas="form-group">
								<label for="email">Email</label>
								<input class="form-control" type="text" name="email" id="email">
							</div>
							<button type="submit" class="form-control btn btn-primary btn-block btn-lg">Add Member</button>
						{!! Form::close() !!}
						@endhasrole
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection