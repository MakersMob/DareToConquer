@extends('layouts.app', ['title' => 'Add a task to the exchange'])

@section('content')
<section class="welcome exchange">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Add a Task to the Exchange</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-6">
				@if(Auth::user()->points > 4)
				<div class="card">
					<div class="card-header">
						What is your task?
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'exchange']) !!}
							<div class="form-group">
								<label for="type">Task Type</label>
								<select class="form-control" name="type" id="type">
									<option value="link">Backlink</option>
									<option value="facebook">Facebook (Like/Share/Comment)</option>
									<option value="comment">Blog (Comment)</option>
									<option value="twitter">Twitter (Reply/Retweet)</option>
									<option value="instagram">Instagram (Like/Comment)</option>
									<option value="pinterest">Pinterest (Repin)</option>
								</select>
							</div>
							<div class="form-group">
								<label for="url">Task URL. Where can they find the location of the task?</label>
								<input type="text" name="url" id="url" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="description">Task Description. What would you like them to do?</label>
								<textarea name="description" id="description" cols="" rows="10" class="form-control"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Create Task</button>
						{!! Form::close() !!}
					</div>
				</div>
				@else
					<p>You don't have enough points to post a task. Complete tasks for other members to earn more points.</p>
				@endif
			</div>
			<div class="col-12 col-lg-6">
				<p>The Member Exchange allows you to set certain tasks for other members so that they can help you grow your blog.</p>
				<p><strong>Each task that you create costs you 10 points.</strong></p>
				<p>To earn more points fulfill tasks for other members in the <a href="/exchange">Exchange</a>.</p>
				<h3>Important Note on Backlink Requests</h3>
				<p>Please do not ask that Members use a certain keyword when linking to you. That is up to them.</p>
			</div>
		</div>
	</div>
</section>
@endsection