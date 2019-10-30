<!DOCTYPE html>
<html lang="en" class="dashy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/JB_Logo.PNG') }}">
  <link rel="stylesheet" href="{{ asset('css/backdrop.css') }}">
  @yield('styles')
  <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('body').on('click', '.logout-button', function() {
        $('#logout-form').trigger('submit');

        return false;
      });
    });
  </script>
  @yield('resources')
</head>
<body>
  @yield('content')
  @yield('modals')
  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    {{ csrf_field() }}
  </form>
</body>
</html>
