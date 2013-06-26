@extends('layout.default')

@section('content')

<h2>Ändra email-adress</h2>

<p>Din nuvarande email är <b>{{ $user->email }}</b>.</p>

{{ Form::open(['url' => 'home/email', 'method' => 'post', 'class' => 'form-horizontal']) }}
  <div class="control-group">
    <label class="control-label" for="email">Ny adress</label>
    <div class="controls">
      {{ Form::email('email', '', ['placeholder' => 'bob@example.net']) }}
      <span class="text-error">{{ $errors->first('email') }}</span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="email2">Upprepa ny adress</label>
    <div class="controls">
      {{ Form::email('email2', '', ['placeholder' => 'bob@example.net']) }}
      <span class="text-error">{{ $errors->first('email2') }}</span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Ändra adress</button>
    </div>
  </div>

{{ Form::close() }}

@stop
