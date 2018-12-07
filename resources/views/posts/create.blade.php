@extends('blog.main')
@section('title','| Create New Post')
@section('style')
{{ Html::style('css/parsley.css')}}
{{ Html::style('css/select2.min.css') }}
<script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		plugins: "code emoticons link hr lists spellchecker image",
		});
</script>
@stop
@section('content')
<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'method' => 'POST', 'files' => true]) !!}
    			{{ Form::label('title','Title:')}}
    			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}
    			{{ Form::label('slug','Slug:')}}
    			{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}
    			{{ Form::label('category_id', 'Category:') }}
    			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    			{{ Form::label('tags', 'Tags:') }}
    			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
    			{{ Form::label('featured_image', 'Featured Image:') }}
    			{{ Form::file('featured_image') }}
    			{{ Form::label('body','Post Body:')}}
    			{{ Form::textarea('body',null, array('class' => 'form-control', 'required' => '', 'rows' => '5'))}}
    			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;'))}}
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop
@section('jquery')
	{{ Html::script('js/jquery-3.3.1.js')}}
	{{ Html::script('js/bootstrap.js')}}
	{{ Html::script('js/select2.min.js') }}
	<script type="text/javascript">
		$(document).ready(function() {
			$('.select2-multi').select2();
		});
	</script>
@stop
@section('parsley')
	{{ Html::script('js/parsley.min.js')}}
@stop
</body>
</html>
