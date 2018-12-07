@extends('blog.main')
@section('title','| Contact Us')
@section('content')
<body>
@endsection
<div class="container">
    <div class="row">
        
        <div class="col-md-6 offset-3">
            <h1>Contact Me</h1>
            <hr>
            <form action ="{{ url('contact') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for = "title">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for = "title">Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>
            <div class="form-group">
                <label for = "body">Message</label>
                <textarea name="body" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="action" value="Submit" class="btn btn-success">
            </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
