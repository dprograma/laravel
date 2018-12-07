@extends('layouts.master')
<h1>This is my Test page</h1>
@section('content')
@if(count($Beatles) > 0)
	@foreach($Beatles as $Beatle)
		{{ $Beatle }} <br>
	@endforeach
@else
<h1>Plain view</h1>
@endif
@endsection