{{ Html::style('css/bootstrap.min.css') }}
	
	<p>You have a new email.</p>
	<hr>
	<div class="row">
		<div class="col-md-6 offset-3">
			<div class="card card-block">
				<p>Subject: {{ $subject }}</p>
				<hr>
				<p>{{ $body }}</p>
			</div>
		</div>
	</div>

{{ Html::script('js/bootstrap.min.js') }}