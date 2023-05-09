<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="{{ asset('theme/favicon.png') }}">

	<meta name="description" content="@yield('title')"/>
	<meta name="keywords" content="bootstrap, bootstrap5"/>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="{{ asset('theme/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/fonts/flaticon/font/flaticon.css') }}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="{{ asset('theme/css/tiny-slider.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/aos.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/glightbox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">

	<link rel="stylesheet" href="{{ asset('theme/css/flatpickr.min.css') }}">

	<title>@yield('title')</title>
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>

    <script src="{{ asset('theme/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('theme/js/tiny-slider.js') }}" defer></script>
    <script src="{{ asset('theme/js/flatpickr.min.js') }}" defer></script>
    <script src="{{ asset('theme/js/aos.js') }}" defer></script>
    <script src="{{ asset('theme/js/glightbox.min.js') }}" defer></script>
    <script src="{{ asset('theme/js/navbar.js') }}" defer></script>
    <script src="{{ asset('theme/js/counter.js') }}" defer></script>
    <script src="{{ asset('theme/js/custom.js') }}" defer></script>

    <!-- page assets -->
    @yield('page_assets')
</body>
</html>
