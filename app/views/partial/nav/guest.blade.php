{{ Former::open()
    ->action(URL::to('auth/login'))
    ->class('navbar-form pull-right') }}

  <input class="span2" type="email" name="email" placeholder="Email">
  <input class="span2" type="password" name="password" placeholder="Lösenord">
  <button type="submit" class="btn">Logga in</button>

{{ Former::close() }}
