@extends('layout.default')

@section('content')

<div class="hero-unit">
  <h1>Golf</h1>
  <p>Svinga en klubba, träffa dina vänner!</p>
</div>

@if(Session::has('flash_notice'))
  <div class="flash-notice">{{ Session::get('flash_notice') }}</div>
@endif

<div class="row">
  <div class="span4">
    @if(Sentry::check())
      <p>Inloggad som {{ $user->full_name }}</p>
    @endif

      <ul>
      @if(Sentry::check())
        <li>{{ HTML::link('auth/logout', 'Logga ut') }}</li>
      @else
        <li>{{ HTML::link('auth/signup', 'Registrera konto') }}</li>
        <li>{{ HTML::link('auth/login', 'Logga in') }}</li>
      @endif

      </ul>
  </div>

  <div class="span4"></div>
  
  <div class="span4">
    <ul>
      <li>Users: {{ $count['users'] }}</li>
      <li>Contests: {{ $count['contests'] }}</li>
      <li>Events: {{ $count['events'] }}</li>
    </ul>
  </div>
</div>

@stop
