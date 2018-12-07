@extends('blog.main')

@section('title', 'Edit Tag')

@section('content')

	<h3>Edit {{ $tags->name }} Tag</h3>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				{!! Form::model($tags, ['route' => ['tags.update', $tags->id], 'method' => 'PUT']) !!}
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{{ Form::submit('Edit Tag', ['class' => 'btn btn-success btn-lg']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection