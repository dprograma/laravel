@extends('blog.main')

@section('title', '| Blog')

@section('content')
	
	<div class="row">
		<div class="col-md-8 offset-2">
			<h1>Blog</h1>
		</div>
	</div>

	@foreach($post as $posts)
		
		<div class="row">
			<div class="col-md-8 offset-2">
				<h2>{{ $posts->title }}</h2>
					<h5>Published: {{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</h5>
					<p><img src="{{ asset("images/$posts->image") }}" class="imagethumb">{{ substr(strip_tags($posts->body), 0, 250) }}{{ strlen(strip_tags($posts->body)) > 250 ? "..." : "" }}</p>
					<a href="{{ route('blog.single', $posts->slug)}}" id = "readmorebtn" class="btn btn-primary">Read More</a>
			<hr>
			</div>
		</div>
	@endforeach
	<div class="row">
		<div class="col-md-8 offset-2">
			<div class="text-center">
				{!! $post->links() !!}
			</div>
		</div>
	</div>
@endsection