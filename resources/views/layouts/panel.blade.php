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
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">@yield('panel-title')</h3>
            </div>
            <div class="panel-body">
        @yield('content')
            </div>


    </div>
  </div>
  @include('includes.scripts')
</body>
</html>