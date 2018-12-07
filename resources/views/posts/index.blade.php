@extends('blog.main')

@section('title', '| View All Posts')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1>View All Posts</h1>
		</div>
		<div class="col-md-4">
			<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg btn-block">Create Post</a>
		</div>
	</div>
	<div class="row">
		<table class="table table-hover table-responsive-md">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($post as $posts)
					<tr>
						<th>{{ $posts->id }}</th>
						<td>{{ $posts->title }}</td>
						<td>{{ substr(strip_tags($posts->body), 0, 30) }}{{ strlen(strip_tags($posts->body)) > 30 ? "..." : "" }}</td>
						<td>{{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</td>
						<td><a href="{{ route('posts.show', $posts->id) }}" class="btn btn-outline-secondary btn-sm">View</a>
							<a href="{{ route('posts.edit', $posts->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
		<div class = "row" style="font-size: 11px; width: 50%; margin: auto; line-height: 32px;">
			{!! $post->links() . '&nbsp;Page ' . $post->currentPage() . ' of ' . $post->total() !!} 
		</div>
	
	<hr>
</div>
	
@stop