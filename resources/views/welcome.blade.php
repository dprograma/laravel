@extends('blog.main')
@section('content')
<body>

<div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="welcome">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog/about">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog/contact">Contact Us</a>
            </li>
          </ul>
        </div>
      </nav>
</div>
</body>
@endsection
</html>
