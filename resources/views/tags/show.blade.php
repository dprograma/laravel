@extends('blog.main')

<?php $titletag = stripslashes($tags->name) ?>

@section('title', "| $titletag Tag")

@section('content')
	<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h3>{{ $tags->name }} Tag <small>{{ $tags->posts()->count() }} Posts</small></h3>
		</div>
		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tags->id) }}" class="btn btn-primary btn-block">Edit</a>
		</div>
		<div class="col-md-2">
			{!! Form::open(['route' => ['tags.destroy', $tags->id], 'method' => 'DELETE']) !!}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
			{!! Form::close() !!}
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover table-responsive-md">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($tags->posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>@foreach($post->tags as $tag)
									<span class="badge badge-secondary">{{ $tag->name }}</span>
								@endforeach
							</td>
							<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-secondary btn-sm">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection