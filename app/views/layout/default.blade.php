<!DOCTYPE html>
<html lang="sv">
<head>
  <title></title>
@include('partial.head')
</head>
<body>

@include('partial.nav')

<div class="container">
  @yield('content')
</div>

@if(false)
  <div class="container container-debug">
    @include('debug.input')
    @include('debug.session')
  </div>
@endif

@include('partial.js-footer')
</body>
</html>
