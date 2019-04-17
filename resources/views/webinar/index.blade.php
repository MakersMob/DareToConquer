@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="billboard"><strong>Member Webinars</strong></h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/webinars/create" class="btn btn-primary">Add Webinar</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson courses">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 sidebar">
				<div class="card">
					<div class="card-body">
						<p>The Community at Dare to Conquer is a remarkable resource. In Slack members exchange ideas and information about the tools they use for their blogs everyday.</p>
						<p>We decided to ask members to share some of that knowledge in webinar form so that the information is available to everyone, at any time.</p>
						<p>We try to cover topics that aren't specifically touched on in the courses. So for example, Elementor is a great tool that you can use to customize your blog, but it's not covered in the courses. Our member Cassy was kind enough to share her knowledge of Elementor, so now that resource is available to you.</p>
						<p>If you think you have a skill that would be useful to the community and would like to do a webinar, let me know! Or if you've just got an idea of something you'd like to see covered in the future, I'd love to hear about it. You can email me at marybeth@daretoconquer.com.</p>
						<p>A big thank you to every member who has volunteered to do one of these! You guys are amazing.</p> 
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<ul class="course-list">
					@foreach($webinars as $webinar)
						<li><a href="/webinars/{{$webinar->id}}">{{$webinar->title}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection