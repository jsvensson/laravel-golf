@extends('layout.default')

@section('content')

<div class="hero-unit">
  <h1>Golf</h1>
  <p>Svinga en klubba, träffa dina vänner!</p>
</div>

@if(Session::has('flash_notice'))
  <div class="flash-notice">{{ Session::get('flash_notice') }}</div>
@endif

@if(Sentry::check())
  <p>Inloggad som {{ $user->full_name }}</p>
@endif

  <ul>
  @if(Sentry::check())
    <li>{{ HTML::link('account/logout', 'Logga ut') }}</li>
  @else
    <li>{{ HTML::link('account/signup', 'Registrera konto') }}</li>
    <li>{{ HTML::link('account/login', 'Logga in') }}</li>
  @endif

  </ul>
@stop
