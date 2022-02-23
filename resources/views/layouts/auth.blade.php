<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.includes.head')
    @include('backend.includes.styles')
</head>
      <body class="hold-transition login-page">
          @yield('content')
          @include('backend.includes.scripts')
      </body>
</html>
