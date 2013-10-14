<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mitt konto <b class="caret"></b></a>
    <ul class="dropdown-menu">
      <li><a href="{{ URL::to('home') }}">Min sida</a></li>
      <li><a href="{{ URL::to('home/settings') }}">Inställningar</a></li>
      <li class="divider"></li>
      <li><a href="{{ URL::to('auth/logout') }}">Logga ut</a></li>
    </ul>
  </li>
</ul>
