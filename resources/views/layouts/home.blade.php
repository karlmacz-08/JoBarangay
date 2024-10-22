<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ config('app.name') }}</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="shortcut icon" href="{{ asset('images/JB_Logo.PNG') }}">
	<link rel="stylesheet" href="{{ asset('css/backdrop.css') }}">
	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	@yield('resources')
</head>
<body>
	@yield('content')
	@yield('modals')
</body>
</html>
