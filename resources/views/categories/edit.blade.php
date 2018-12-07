@extends('blog.main')

<?php $titletag = stripslashes($categories->name) ?>

@section('title', "| Edit $titletag Category")

@section('content')
	
	<div class="row">
		<div class="col-md-8 offset-2">
			<h3>Edit {{ $categories->name }}</h3>
			<hr>
			{!! Form::model($categories, ['route' => ['categories.update', $categories->id], 'method' => 'PUT']) !!}

				{{ Form::label('name', 'Category Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
				{{ Form::submit('Edit Category', ['class' => 'btn btn-primary btn-block']) }}

			{!! Form::close() !!}
		</div>
	</div>

@endsection