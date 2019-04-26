@extends('layouts.app', ['title' => $webinar->title, 'description' => $webinar->description])

@section('content')
<section class="welcome course">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="preheader"><a href="/webinars">DTC Member Webinars</a></h3>
				<h1 class="">{{ $webinar->title }}</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/webinars/{{ $webinar->id }}/edit" class="btn btn-primary">Edit Webinar</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 main">
                <script src="https://fast.wistia.com/embed/medias/{{ $webinar->video }}.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_{{ $webinar->video }} videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/{{ $webinar->video }}/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
				{!! $webinar->description !!}
			</div>
		</div>
	</div>
</section>
@endsection