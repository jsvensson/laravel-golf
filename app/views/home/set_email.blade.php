@extends('layout.default')

@section('content')

<h2>Ändra email-adress</h2>

<p>Din nuvarande email är <b>{{ $user->email }}</b>.</p>

{{ Form::open(['url' => 'home/set-email', 'method' => 'post', 'class' => 'form-horizontal']) }}
<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="email">Ny adress</label>
    <div class="controls">
      <input type="email" id="email" name="email" placeholder="me@example.net">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="email2">Upprepa ny adress</label>
    <div class="controls">
      <input type="email" id="email2" name="email2" placeholder="me@example.net">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Spara</button>
    </div>
  </div>
{{ Form::close() }}

@stop
