<!doctype html>
<html lang="en">
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>My Blog @yield('title')</title>
@include('partials._css')
@include('partials._js')
@yield('jquery')
@yield('parsley')
<script type="text/javascript" src="js/bootstrap.js"></script>
@yield('style')
  </head>
<body>
<div class="container">
@include('partials._homenav')
@include('partials._messages')

@yield('content')
</body>
</div>