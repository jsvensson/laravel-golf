<ul class="nav pull-right">
  <li id="fat-menu" class="dropdown">
    <button id="usermenu" role="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ $user->initial_name }} <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="usermenu">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ URL::to('account/settings') }}">Inställningar</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ URL::to('auth/logout') }}">Logga ut</a></li>
    </ul>
  </li>
</ul>
