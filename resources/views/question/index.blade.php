@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="">Online Business FAQ</h1>
				@role('admin')
					<div class="" style="margin-top: 2rem;"><a href="/questions/create" class="btn btn-primary">Add Question</a></div>
				@endrole
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-8">
				<ul class="no-bullet sans-serif">
					@foreach($questions as $question)
						<li style="margin-bottom: 1rem;">[<span class="question-category"><a href="/questions/category/{{ strtolower($question->category) }}">{{ $question->category }}</a></span>] <a href="/questions/{{ $question->slug }}" class="question-link">{{ $question->question }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-12 col-lg-4 sidebar">
				<div style="margin-bottom: 1rem;">
					<script src="https://fast.wistia.com/embed/medias/5gev97vnui.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><span class="wistia_embed wistia_async_5gev97vnui popover=true popoverAnimateThumbnail=true videoFoam=true" style="display:inline-block;height:100%;width:100%">&nbsp;</span></div></div>
				</div>
				<h4>Categories</h4>
				<ul class="list-group" style="margin-bottom: 2rem;">
					<li class="list-group-item"><a href="/questions/category/affiliate-marketing">Affiliate Marketing</a></li>
					<li class="list-group-item"><a href="/questions/category/bbc">Billionaire Blog Club</a></li>
					<li class="list-group-item"><a href="/questions/category/blogging">Blogging</a></li>
					<li class="list-group-item"><a href="/questions/category/analytics">Google Analytics</a></li>
					<li class="list-group-item"><a href="/questions/category/pinterest">Pinterest</a></li>
					<li class="list-group-item"><a href="/questions/category/seo">SEO</a></li>
				</ul>
				<p>This stuff takes a long time to put together so I don&rsquo;t have time to write bullshit answers.</p>
				<p>Let&rsquo;s just get right to it.</p>
				<p>If you have a question then feel free to submit it to <a href="mailto:scrivs@daretoconquer.com?subject=FAQ Question">scrivs@daretoconquer.com</a>.</p>
			</div>
		</div>
	</div>
</section>
@endsection