@extends('blog.main')

@section('title', '| Create New Tags')

@section('content')

	<div class="row">
		<div class="col-md-7 offset-1">
			<h1>Tags</h1>
			<table class="table table-hover table-responsive-md">
				<thread>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thread>
				@foreach($tags as $tag)
					<tbody>
						<tr>
							<th>{{ $tag->id }}</th>
							<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
						</tr>
					</tbody>

				@endforeach
			</table>
		</div><!--end col-md-8 -->
		<div class="col-md-3">
			<div class="card card-body bg-light">
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
					<h2>Create Tag</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:10px;']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div><!--end of row>

@endsection
