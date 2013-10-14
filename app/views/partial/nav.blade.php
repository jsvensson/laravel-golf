{{--
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('home') }}">Golf</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tävlingar <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('contest.index') }}">Öppna tävlingar</a></li>
          @if(!empty($user))
            <li class="divider"></li>
            <li><a href="{{ URL::route('contest.create') }}">Skapa ny tävling</a></li>
          @endif
          </ul>
        </li>
      </ul>

      @if( ! empty($user))
        @include('partial.nav.auth')
      @else
        @include('partial.nav.guest')
      @endif
    </div><!--/.navbar-collapse -->
  </div>
</div>
--}}

<nav class="navbar navbar-inverse navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Golf</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tävlingar <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ URL::route('contest.index') }}">Aktuella tävlingar</a></li>
        @if(!empty($user))
          <li class="divider"></li>
          <li><a href="{{ URL::route('contest.create') }}">Skapa ny tävling</a></li>
        @endif
        </ul>
      </li>
    </ul>
  @if(!empty($user))
    @include('partial.nav.auth')
  @else
    @include('partial.nav.guest')
  @endif
  </div><!-- /.navbar-collapse -->
</nav>
