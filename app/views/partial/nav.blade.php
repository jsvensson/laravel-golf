  <div id="navbar" class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="#">Golf</a>
        <ul class="nav" role="navigation">
          <li class="dropdown">
            <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Tävlingar <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="http://google.com">Mina tävlingar</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#anotherAction">Öppna tävlingar</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#anotherAction">Avslutade tävlingar</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Skapa tävling</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Statistik <b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
              <li role="presentation" class="divider"></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
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
