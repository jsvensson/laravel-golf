@extends('layout.default')

@section('content')

<h2>Inställningar</h2>

<a href="{{ URL::to('home/set-password') }}">Ändra lösenord</a>
<a href="{{ URL::to('home/set-email') }}">Ändra lösenord</a>


<h3>Kontouppgifter</h3>

{{ Form::open(['url' => 'home/settings', 'method' => 'post', 'class' => 'form-horizontal']) }}

  <div class="control-group">
    <label class="control-label" for="first_name">Förnamn</label>
    <div class="controls">
      <input type="text" id="first_name" name="first_name" placeholder="Förnamn" value="{{ $user->first_name }}">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="last_name">Efternamn</label>
    <div class="controls">
      <input type="text" id="last_name" name="last_name" placeholder="Förnamn" value="{{ $user->last_name }}">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="handicap">Handikapp</label>
    <div class="controls">
      <input class="input-small" type="number" min="-100" max="100" id="handicap" name="handicap" placeholder="Handikapp" value="{{ $user->profile->handicap }}">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Spara inställningar</button>
    </div>
  </div>
{{ Form::close() }}

@stop
