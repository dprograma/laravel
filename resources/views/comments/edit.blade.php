@extends('blog.main')

@section('title', '| Edit Comment')

@section('content')

	<div class="container">
			
		<div class="row">
			<div class="col-md-8 offset-2">
				<h3>Edit Comment</h3>
				{!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
					{{ Form::label('email', 'Email:') }}
					{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
					{{ Form::label('comment', 'Comment:') }}
					{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
					{{ Form::submit('Update Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 15px;']) }}
				{!! Form::close() !!}
			</div>
		</div>

	</div>

@endsection