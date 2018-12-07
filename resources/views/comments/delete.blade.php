@extends('blog.main')

@section('title', '| Delete Comment')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Delete Comment</h3>
			<p>Name: {{ $comment->name }}</p>
			<p>Email: {{ $comment->email }}</p>
			<p>Comment: {{ $comment->comment }}</p>

			{!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}
				{{ Form::submit('Click to delete the comment', ['class' => 'btn btn-danger btn-block']) }}
			{!! Form::close() !!}
		</div>
		
	</div>
</div>

@endsection