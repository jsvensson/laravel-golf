@extends('layout.default')

@section('content')

<h2>Inställningar</h2>

<ul>
  <li><a href="{{ URL::to('home/password') }}">Ändra lösenord</a></li>
  <li><a href="{{ URL::to('home/email') }}">Ändra email</a></li>
</ul>

<h3>Kontouppgifter</h3>

{{ Former::horizontal_open() }}
{{ Former::populate($user) }}

  {{ Former::text('first_name')->label('Förnamn') }}
  {{ Former::text('last_name')->label('Efternamn') }}

{{-- FIXME: Bug in Former, do this in raw HTML for now. }}
  {{ Former::number('profile.handicap')->label('Handikapp') }}
  {{ Former::url('profile.website')->label('Hemsida') }}
--}}

  <div class="control-group">
    <label for="profile.handicap" class="control-label">Handikapp</label>
    <div class="controls">
      <input id="profile.handicap" type="number" name="profile.handicap" value="{{ $user->profile->handicap }}">
    </div>
  </div>

  <div class="control-group">
    <label for="profile.website" class="control-label">Hemsida</label>
    <div class="controls">
      <input id="profile.website" type="url" name="profile.website" value="{{ $user->profile->website }}">
    </div>
  </div>

  {{ Former::primary_submit()->value('Spara inställningar') }}

{{ Former::close() }}

@stop
