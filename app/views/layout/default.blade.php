<!DOCTYPE html>
<html lang="sv">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

@stylesheets('bootstrapper')
@stylesheets('application')

</head>
<body>

@include('partial.nav')

<div class="container">
  @include('partial.flash')
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
