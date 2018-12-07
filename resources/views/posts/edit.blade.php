@extends('blog.main')
@section('title','| Edit Post')
<style type="text/css" src = "..css/bootstrap.ss"></style>
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
	<h1>Edit Post</h1>
	<div class="row">
		<div class="col-md-6 offset-3">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
				{{ Form::label('title','Title:') }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}
				{{ Form::label('slug','Slug:')}}
    			{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}
    			{{ Form::label('category_id','Category:')}}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
				{{ Form::label('tags','Tags:')}}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
				{{ Form::label('featured_image', 'Featured Image:', ['class' => 'form-spacing']) }}
    			{{ Form::file('featured_image') }}
				{{ Form::label('body', 'Post Body:') }}
				{{ Form::textarea('body', null, ['class' => 'form-control form-spacing']) }}			
		</div>
		<div class="col-md-3">
			<div class="card card-body bg-light">
			<h3>Post Details</h3>
			<hr>
			<dl class="dl-horizontal">
				<dt>Url:</dt>
				<dd><a href = "{{ route('posts.show', $post->id) }}">{{ url($post->slug) }}</a></dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Category:</dt>
				<dd>{{ $post->category->name }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Updated At:</dt>
				<dd>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::submit('Save', array('class' => 'btn btn-success btn-block')) !!}
				</div>
			</div>
			</div>
		</div>
		{!! Form::close() !!}
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
			$('.select2-multi').select2().val({{ json_encode($post->tags()->allRelatedIds()) }}).trigger('change');
		});
	</script>
@stop
@section('parsley')
	{{ Html::script('../js/parsley.min.js')}}
@stop
</body>
</html>