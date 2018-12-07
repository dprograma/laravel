@extends('blog.main')

@section('title', '| View Post')

@section('content')
	
<div class="container">

	<div class="row">
		<div class="col-md-7 offset-1">
			<h1>{{ $post->title }}</h1>
			<div class="card card-body bg-light">
				<img src="{{ asset('images/' . $post->image) }}" height="400" width="575">
				<p class="lead">{!! $post->body !!}</p>
			</div>
		<hr>
			@foreach($post->tags as $tag)
				 
				<span class="badge badge-secondary">
					{{ $tag->name }}
				</span>

			@endforeach

			<div id = "backend-comments" style = "margin-top: 50px;">
				<h3>
					Comments <small>{{ $post->comments()->count() }} total</small> 
				</h3>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="120px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach($post->comments as $comment)
							<tr>
								<td>{{ $comment->name }}</td>
								<td>{{ $comment->email }}</td>
								<td>{{ $comment->comment }}</td>
								<td>
									<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
									<a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>					
				</table>
			</div>
		</div>
		
		<div class="col-md-3">
			<div class="card card-body bg-light">
			<h3>Post Details</h3>
			<hr>
			<dl class="dl-horizontal">
				<dt>URL:</dt>
				<dd><a href = "{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Category:</dt>
				<dd>{{ $post->category->name }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At:</dt>
				<dd>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
					{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
					{!! Form::close() !!}

				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-light btn-block', 'style' => 'margin-top:10px;'])}}
				</div>
			</div>
			</div>
		</div>
	</div>
	
</div>

@stop