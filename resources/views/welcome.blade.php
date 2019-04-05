@extends('layouts.app', ['title' => 'Build the Online Business of Your Dreams'])

@section('content')
<section class="welcome home">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="billboard">You will <span>quit your job</span> in 12 months.</h1>
        </div>
    </div>
  </div>
</section>
<section class="content lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>Hello!</p>
				<p><strong>My name is Paul Scrivens and I believe that everyone deserves the opportunity to achieve the lifestyle that they want. That's why I created Dare to Conquer.</strong></p>
				<p>It's my goal to help everyone that is willing to learn achieve the lifestyle they know they have in them.</p>
				<p>My favorite books as a kid were the <em>Choose Your Own Adventure</em> books. My Mom didn't like me reading them because they weren't really books. More like videogames in text form.</p>
				<div class="image" style="float:left; margin-right: 2rem; margin-bottom: 2rem;">
					<img src="https://daretoconquer-app-master.s3.amazonaws.com/53/Cave_of_time.jpg">
				</div>
				<p>Anyways, I loved them because I liked the idea of there being more than one path to take. Nothing was ever definitive. Sometimes you would get a good ending and other times you didn't.</p>
				<p>Whenever you got a bad ending it wasn't so bad because you could always go back a couple of steps and try again.</p>
				<p>This is exactly like building an online business. Sometimes you turn the page and think <em>damn, I didn't want this ending</em> while other times you turn the page and successfully reach the goal.</p>
				<p><strong>Dare to Conquer isn't about finding the one true path to success.</strong> It's about conquering a lot of different things that over time will lead you to your goals.</p>
				<p>So in true <em>Choose Your Own Adventure</em> style, you get to pick your next step (please note I say "online business" and you can replace that with <em>blog</em> if you want):</p>
				<ul>
					<li><a href="/origin-story">I don't even know where to begin or know if this online business thing is for me.</a></li>
					<li><a href="/no-traffic">I started my online business but nobody is visiting me.</a></li>
					<li><a href="/want-more-money">I'm making a little bit of money but I'm definitely not hitting my potential.</a></li>
					<li><a href="/online-funnels">I think I've taken things as far as I can, but maybe there is another level to go that I'm missing.</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>I'm not going to pretend there is a single course that will knock out every single aspect of building a successful online business. It would be too hard to organize something like that.</p>
				<p>That's why I've broken DTC up into multiple courses to help target specific aspects of your online journey.</p>
				<h2>DTC Courses</h2>
				<p>DTC Courses are mostly text-based with some video mixed in. The goal is to make the courses as accessible as possible and videos are only used when specific instructions must be shown on how to accomplish a task.</p>
				<p>The courses are constantly being updated as I continue to grow myself with the topics and you'll always have access to them. There are no "next" versions of the course that you have to pay to upgrade to.</p>
				<p>No matter how a course is updated, if you paid for it, you own it.</p>
				<ul class="@role('bronze')mini-course-list @endhasrole course-list">
					@foreach($courses as $course)
						<li><a href="/course/{{$course->slug}}">{{$course->name}} - ${{ $course->price }}</a></li>
					@endforeach
					<li><a href="/join">Full Access to All Courses &amp; Journeys</a></li>
				</ul>
				<p><strong>However, before you consider buying a course or full access to DTC, I want you to take advantage of all of the free resources that I offer.</strong></p>
				<p>Keep on scrolling and you'll see my latest YouTube videos along with my free Business Email Bootcamps. It's important to me that you feel like you've stretched yourself with the free stuff before opening up your wallet and joining.</p>
				<p>I know, I'm supposed to convince you that it's the end of the world if you don't join and cause you to panic buy stuff, but that doesn't seem right.</p>
				<p>So let's do things the right way.</p>
			</div>
		</div>
	</div>
</section>
<section class="content rose">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2>Recent <a target="_blank" href="https://www.youtube.com/channel/UC8oSwL2gkSn_zH8wwJMIHrw">DTC YouTube</a> Videos</h2>
			</div>
			@foreach($youtubes as $youtube)
				<div class="col-12 col-lg-4">
					<div class="image">
						<a target="_blank" href="https://youtube.com/watch?v={{ $youtube->youtube_id }}"><img src="http://img.youtube.com/vi/{{ $youtube->youtube_id }}/mqdefault.jpg"></a>
						<p><small><strong><a href="https://youtube.com/watch?v={{ $youtube->youtube_id }}">{{ $youtube->title }}</a></strong></small></p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
<section class="content smoke lesson">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p>If you're the type that likes to scan a whole page to see what is going on then I've created a section just for you.</p>
				<p>Seriously.</p>
				<p>That's why I just made the paragraph above a single word because it is supposed to get your attention.</p>
				<p>Even better I created a video for you to watch.</p>
				<p>Watch it.</p>
				<h2>Why Does Dare to Conquer Exist?</h2>
				<p>I've been in the position where I wondered if there was more for me out there. Why was I spending so much time making other people money?</p>
				<p>I've been lost staring at the computer screen freaking out because I didn't know where to even begin.</p>
				<p>I've been pulling my hair out because nobody was coming to my site.</p>
				<p>Nothing is more frustrating than knowing there is opportunity at your fingertips but for some reason your hands are covered in butter and you just can't grasp it.</p>
				<p><em>Dare to Conquer</em> exists because you shouldn't have to feel any of this.</p>
				<p><strong>You deserve the opportunity to strive for the lifestyle that you desire.</strong></p>
				<p><a href="/join">Join today</a> or go and explore the site some more.</p>
			</div>
		</div>
	</div>
</section>
@endsection