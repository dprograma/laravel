@extends('blog.main')
<?php $titletag = stripslashes($post->title) ?>
@section('title', "| $titletag")
@section('content')
	<div class="row">
		<div class="col-md-8 offset-2">
			<img src="{{ asset("images/$post->image") }}" width="800" height="400" alt="featured image">
			<h1>{{ $post->title }}</h1>
			<p>{!!$post->body !!}</p>
			<hr>
			<p>Category: {{ $post->category->name }}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 offset-2">
			<h3 class="comment-title">
				 <i class="fas fa-comments"></i> {{ $post->comments()->count() }} Comments
			</h3>
			@foreach($post->comments as $comment)
			<div class="comment">
				<div class="author-info">
					<img class="author-image" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mp" }}" >
					<h4>{{ $comment->name }}</h4>
					<p class="author-time">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
				</div>
				<div class="comment-content">
					{{ $comment->comment }}
				</div>
			</div>
			@endforeach
		</div>
	</div>
		
	<div class="row">
		<div id="comment-form" class="col-md-8 offset-2">
			{!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
			<div class="row">
				<div class="col-md-6">
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
				</div>
				<div class="col-md-6">
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 offset-2">
			{{ Form::label('comment', 'Comment:') }}
			{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
			{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection