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
	@include('include.scripts')
</body>

</html>