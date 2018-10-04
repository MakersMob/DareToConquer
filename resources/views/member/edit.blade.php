@extends('layouts.app', ['title' => 'Update Your Profile'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Update Your Profile</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						Profile Info
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'member/'.$user->id, 'method' => 'patch']) !!}
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="first_name">First Name</label>
										<input class="form-control" type="text" name="first_name" id="first_name" required value="{{ $user->first_name }}">
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="last_name">Last Name</label>
										<input class="form-control" type="text" name="last_name" id="last_name" required value="{{ $user->last_name }}">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" required value="{{ $user->email }}">
							</div>
							<button type="submit" class="btn btn-lg btn-primary btn-block">Update Profile</button>
						{!! Form::close() !!}
					</div>
				</div>
				<h3 style="margin-top: 2rem;">Updating Avatar</h3>
				<p>DTC uses <a href="http://gravatar.com">Gravatar</a> to manage avatars. Use your DTC email and the site will automatically pull your avatar.</p>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						Password
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'password/'.$user->id, 'method' => 'patch']) !!}
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" required value="">
							</div>
							<button type="submit" class="btn btn-lg btn-primary btn-block">Update Password</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection