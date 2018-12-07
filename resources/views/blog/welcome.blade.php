@extends('blog.main')
@section('title','| Home')
@section('content')
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
      <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
              <h1 class="display-3">@guest Hello, World! @else Hello {{ Auth::user()->name }}!@endguest</h1>
              <p>This is a marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
              <p><a class="btn btn-primary btn-lg" href="{{ route('blog.index')}}" role="button">Learn more &raquo;</a></p>
            </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h3>Recent Posts <i class="fas fa-posts"></i></h3>
            <hr>
            @foreach($posts as $post)
            <div class="post">
                <h4>{{ $post->title }}</h4>
                <p><img src="{{ asset("images/$post->image") }}" class="imagethumb"> {{ strip_tags($post->body) }}</p>
                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">More...</a>
            </div>
            <hr>
            @endforeach
        </div>
        <div class="col-md-3 offset-1 card card-body">
            <h3>Sponsored Posts </h3>
        </div>
    </div>
</div>
</body>
@endsection
</html>
