<div class="col-md-6 offset-3">
	@if (Session::has('success'))
		<div class="alert alert-success alert-dismissible fade show" role = "alert">
			<strong>Success: </strong>{{ Session::get('success')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	@if(count($errors)>0)
		<div class="alert alert-danger alert-dismissible fade show" role = "alert">
			<strong>Errors:</strong>
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
				@endforeach
			</ul>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
</div>