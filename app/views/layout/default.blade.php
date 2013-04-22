<html>
<head>
  <title></title>
@include('partial.head')
</head>
<body>

@include('partial.nav')

<div class="container">
  @yield('content')
</div>

<div class="container container-debug">
  @include('debug.input')
  @include('debug.session')
</div>


@include('partial.js-footer')
</body>
</html>
