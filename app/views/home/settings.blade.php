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
  {{ Former::number('profile.handicap')->label('Handikapp') }}
  {{ Former::url('profile.website')->label('Hemsida') }}

  {{ Former::primary_submit()->value('Spara inställningar') }}

{{ Former::close() }}

@stop
