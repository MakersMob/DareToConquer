@extends('layouts.app', ['title' => 'Add a Business'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Add Your Business</h1>
			</div>
		</div>
	</div>
</section>
<section class="content directory smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-4 sidebar">
				<div class="">
					<p>Add your Business(s) to the Billionaire Business Club Directory.</p>
					<p>This will allow other members to see what you are working on and maybe new collaborations can start to pop up.</p>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-header">
						Business Details
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'directory']) !!}
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="name">Business Name</label>
										<input class="form-control" type="text" id="name" name="name" required>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="url">Business URL</label>
										<input class="form-control" type="text" id="url" name="url" required>
										<small class="form-text text-muted">http://yourBusiness.com</small>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="feed">Business Feed URL</label>
										<input class="form-control" type="text" id="feed" name="feed" value="" >
										<small class="form-text text-muted">http://yourBusiness.com/feed</small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="niche">What niche(s) does your Business fall under?</label>
								<div class="row">
									@foreach($niches as $niche)
										<div class="col-12 col-lg-6">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" value="{{ $niche->id}}" name="niches[]"> {{ $niche->name }}
											</label>
										</div>
									@endforeach
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="pinterest">Pinterest Username</label>
										<input class="form-control" type="text" id="pinterest" name="pinterest">
										<small class="form-text text-muted">http://pinterest.com/<strong>USERNAME</strong></small>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="twitter">Twitter Username</label>
										<input class="form-control" type="text" id="twitter" name="twitter">
										<small class="form-text text-muted">http://twitter.com/<strong>USERNAME</strong></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="facebook">Facebook Page URL</label>
										<input class="form-control" type="text" id="facebook" name="facebook" >
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="instagram">Instagram Username</label>
										<input class="form-control" type="text" id="instagram" name="instagram">
										<small class="form-text text-muted">http://instagram.com/<strong>USERNAME</strong></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" id="description" cols="" rows="10"></textarea>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" type="checkbox" value="1" name="guest_post">
							    Does your Business accept guest posts? If you check this box, please fill out the criteria below. This will put your Business into the <a href="/guest-post">Guest Post Directory</a>.
							  </label>
							</div>
							<div class="form-group">
								<label for="guest_post_description">Guest post criteria and how to get started</label>
								<textarea class="form-control" name="guest_post_description" id="guest_post_description" cols="" rows="10"></textarea>
							</div>
							<button type="submit" class="btn btn-large btn-primary btn-block">Add Business</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection