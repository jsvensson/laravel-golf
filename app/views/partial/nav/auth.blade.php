<div class="btn-group pull-right">
  <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">Mitt konto <span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="{{ URL::to('account/settings') }}">Inställningar</a></li>
    <li class="divider"></li>
    <li><a href="{{ URL::to('account/logout') }}">Logga ut</a></li>
  </ul>
</div>
