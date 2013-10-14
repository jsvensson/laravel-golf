{{ Former::open()
    ->action(URL::to('auth/login'))
    ->class('navbar-form navbar-right') }}

  <div class="form-group">
    <input type="text" name="email" placeholder="Email" class="form-control">
  </div>
  <div class="form-group">
    <input type="password" name="password" placeholder="Lösenord" class="form-control">
  </div>
  <button type="submit" class="btn btn-success">Logga in</button>

{{ Former::close() }}
