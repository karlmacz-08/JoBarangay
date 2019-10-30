<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name') }}</title>
@yield('resources')
</head>
<body>
@yield('content')
@yield('modals')
</body>
</html>
