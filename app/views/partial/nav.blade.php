<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="{{ URL::to('/') }}">Golf</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li>{{ HTML::link(URL::to('home'), 'Min sida') }}</li>
          <li><a href="#about">Tävlingar</a></li>
          <li><a href="#contact">Statistik</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
