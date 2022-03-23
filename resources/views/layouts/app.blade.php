<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:image" itemprop="image primaryImageOfPage" content="{!!url('/')!!}/assets/images/remedy-logo.png" />

	<link rel="icon" href="{{ asset('assets/images/remedy-logo.png')}}">
	

	<title>@yield('title') | {{ config('app.name') }}</title>

	@include('include.styles')
</head>

<body class="@yield('body-class')">
	<div class="loader_area">
		<div class="loader"></div>
		<div class="loader_text">Please Wait...</div>
	</div>

	<!-- <div id="overlay">
		<div id="text">Please wait...</div>
	</div> -->
	@include('include.header')
	<div class="remedy-umbrella-layout">
		@yield('content')
	</div>
	@include('include.footer')

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	@include('include.scripts')
	@stack('js')
	
</body>

</html>
