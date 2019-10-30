<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
