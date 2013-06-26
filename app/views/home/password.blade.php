@extends('layout.default')

@section('content')

<h2>Ändra lösenord</h2>

{{ Form::open(['url' => 'home/password', 'method' => 'post', 'class' => 'form-horizontal']) }}

  <div class="control-group">
    <label class="control-label" for="old_password">Nuvarande lösenord</label>
    <div class="controls">
      {{ Form::password('old_password') }}
      <span class="text-error">{{ $errors->first('old_password') }}</span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="new_password">Nytt lösenord</label>
    <div class="controls">
      {{ Form::password('new_password') }}
      <span class="text-error">{{ $errors->first('new_password') }}</span>
    </div>
  </div>

  <div class="control-group">
    <label class="control-label" for="repeat_new_password">Upprepa nytt lösenord</label>
    <div class="controls">
      {{ Form::password('repeat_new_password') }}
      <span class="text-error">{{ $errors->first('repeat_new_password') }}</span>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Ändra lösenord</button>
    </div>
  </div>


{{ Form::close() }}

@stop
