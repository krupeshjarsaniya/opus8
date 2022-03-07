<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="og:image" itemprop="image primaryImageOfPage"
		content="{!!url('/')!!}/assets/front/images/hd_thumbnail.png" />

	<link rel="icon" href="{{ asset('assets/front/images/favicon.ico')}}">

	<title>@yield('title') | {{ config('app.name') }}</title>

	@include('front.include.styles')
</head>
{{-- <body class="{{'hd-url-' . request()->route()->uri}}"> --}}

<body class="@yield('body-class')">

	<div class="hd-main-body">

		@include('front.include.header-auth')

		<div class="hd-main-content">
			@yield('content')
		</div>

		@if (Route::currentRouteName() === 'sell-song' || Route::currentRouteName() === 'upload-music' ||
		Route::currentRouteName() === 'artwork' || Route::currentRouteName() === 'mastering' ||
		Route::currentRouteName() === 'visualizers' || Route::currentRouteName() === 'virtual-events')
		@include('front.include.footer')
		@endif
	</div>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		@csrf
	</form>

	@include('front.include.header-menu-open')
	@include('front.include.scripts')
</body>

</html>