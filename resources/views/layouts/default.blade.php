<!doctype html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  @include('includes.head')
</head>
<body>
  @if (!Auth::guest())
    @include('includes.navbar')
  @endif
  <div class="container">
    @include('includes.errors')
    @include('includes.status')
    @yield('content')
  </div>
  @include('includes.scripts')
</body>
</html>