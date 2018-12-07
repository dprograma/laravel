@extends('blog.main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-7 offset-1">
			<h1>Categories</h1>
			<table class="table table-hover table-responsive-md">
				<thread>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th></th>
					</tr>
				</thread>
				@foreach($categories as $category)
					<tbody>
						<tr>
							@if($category->name == 'uncategorized')
							{{ " " }}
							@else
							<th>{{ $category->id }}</th>
							<td>{{ $category->name }}</td>
							<td>
								<div class="row">
								<div class="col-sm-2">
								{!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
									{{ Form::hidden('name', "uncategorized", []) }}
									{{ Form::submit('Delete', ['class' => 'btn btn-outline-secondary btn-sm']) }}
								{!! Form::close() !!}
								</div>
								<div class="col-sm-2">
								<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
								</div>
							</div>
							</td>
						</tr>
						@endif
					</tbody>

				@endforeach
			</table>
		</div><!--end col-md-8 -->
		<div class="col-md-3">
			<div class="card card-body bg-light">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					<h2>Create Category</h2>
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block', 'style' => 'margin-top:10px;']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div><!--end of row>

@endsection