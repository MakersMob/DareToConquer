@extends('layouts.app', ['title' => 'Edit Business Details'])

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Edit Your Business Details</h1>
			</div>
		</div>
	</div>
</section>
<section class="content smoke">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-4 sidebar">
				<div class="">
					<p>Edit your business's info.</p>
					<p>This will allow other members to see what you are working on and maybe new collaborations can start to pop up.</p>
				</div>
			</div>
			<div class="col-12 col-lg-8">
				<div class="card">
					<div class="card-header">
						Business Details
					</div>
					<div class="card-body">
						{!! Form::open(['url' => 'directory/'.$biz->id, 'method' => 'patch']) !!}
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="name">Business Name</label>
										<input class="form-control" type="text" id="name" name="name" value="{{ $biz->name }}" required>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="url">Business URL</label>
										<input class="form-control" type="text" id="url" name="url" value="{{ $biz->url }}">
										<small class="form-text text-muted">http://yourbiz.com</small>
									</div>
								</div>
								<div class="col-12 col-lg-3">
									<div class="form-group">
										<label for="feed">Business Feed URL</label>
										<input class="form-control" type="text" id="feed" name="feed" value="{{ $biz->feed }}">
										<small class="form-text text-muted">http://yourbiz.com/feed</small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="niche">What niche(s) does your business fall under?</label>
								<div class="row">
									@foreach($niches as $niche)
										<div class="col-12 col-lg-6">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" value="{{ $niche->id}}" name="niches[]" @if($biz->niches->contains($niche->id)) checked @endif> {{ $niche->name }}
											</label>
										</div>
									@endforeach
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="pinterest">Pinterest Username</label>
										<input class="form-control" type="text" id="pinterest" name="pinterest" value="{{ $biz->pinterest }}">
										<small class="form-text text-muted">http://pinterest.com/<strong>USERNAME</strong></small>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="twitter">Twitter Username</label>
										<input class="form-control" type="text" id="twitter" name="twitter" value="{{ $biz->twitter }}">
										<small class="form-text text-muted">http://twitter.com/<strong>USERNAME</strong></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="facebook">Facebook Page URL</label>
										<input class="form-control" type="text" id="facebook" name="facebook" value="{{ $biz->facebook }}" >
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="form-group">
										<label for="instagram">Instagram Username</label>
										<input class="form-control" type="text" id="instagram" name="instagram" value="{{ $biz->instagram }}">
										<small class="form-text text-muted">http://instagram.com/<strong>USERNAME</strong></small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="description">Your Why</label>
								<textarea class="form-control" name="description" id="description" cols="" rows="10">{{ $description }}</textarea>
							</div>
							<div class="form-check">
							  <label class="form-check-label">
							    <input class="form-check-input" type="checkbox" value="1" name="guest_post" @if($biz->guest_post == 1) checked @endif>
							    Does your business accept guest posts? If you check this box, please fill out the criteria below. This will put your business into the <a href="/guest-post">Guest Post Directory</a>.
							  </label>
							</div>
							<div class="form-group">
								<label for="guest_post_description">Guest post criteria and how to get started</label>
								<textarea class="form-control" name="guest_post_description" id="guest_post_description" cols="" rows="10">{{ $guest_post_description }}</textarea>
							</div>
							<button type="submit" class="btn btn-large btn-primary btn-block">Edit Business</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection