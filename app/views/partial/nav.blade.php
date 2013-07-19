  <div id="navbar" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="{{ url('/') }}">Golf</a>
        <ul class="nav" role="navigation">
          <li class="dropdown">
            <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Tävlingar <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('contest') }}">Öppna tävlingar</a></li>
            @if(Sentry::check())
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('contest/create') }}">Skapa tävling</a></li>
            @endif
            </ul>
          </li>
        </ul>
        @if(Sentry::check())
          @include('partial.nav.auth')
        @else
          @include('partial.nav.guest')
        @endif

      </div>
    </div>
  </div> <!-- /navbar-example -->
