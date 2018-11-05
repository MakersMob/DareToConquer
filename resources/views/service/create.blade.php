@extends('layouts.app')

@section('content')
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Add Your Service</h1>
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
						{!! Form::open(['url' => 'service']) !!}
							<div class="form-group">
								<label for="name">Name</label>
								<input class="form-control" type="text" name="name" id="name">
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control" name="description" rows="20"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Add Service</button>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<p>You can use HTML in the description. Don't worry, it's not bad at all. I've included some sample code below.</p>
				<h4>Link</h4>
				<p><code>&lt;a href="http://myawesomesite.com/services"&gt;You can find my services page here&lt;/a&gt;</code></p>
				<p><a href="http://myawesomesite.com/services">You can find my services page here</a>.</p>
				<h4>Bold</h4>
				<p><code>&lt;strong&gt;This is now bold text&lt;/strong&gt;</code></p>
				<p><strong>This is now bold text</strong></p>
				<h4>Italics</h4>
				<p><code>&lt;em&gt;This is now italics&lt;/em&gt;</code></p>
				<p><em>This is now italics.</em></p>
				<h4>Unordered List</h4>
				<p><code>&lt;ul&gt;<br>&lt;li&gt;This is a list item&gt;/li&gt;<br>&lt;li&gt;And another&gt;/li&gt;<br>&lt;/ul&gt;</code></p>
				<ul>
					<li>This is a list item</li>
					<li>And another</li>
				</ul>
				<h4>Ordered List</h4>
				<p><code>&lt;ol&gt;<br>&lt;li&gt;This is a list item&gt;/li&gt;<br>&lt;li&gt;And another&gt;/li&gt;<br>&lt;/ol&gt;</code></p>
				<ol>
					<li>This is a list item</li>
					<li>And another</li>
				</ol>
			</div>
		</div>
	</div>
</section>
@endsection