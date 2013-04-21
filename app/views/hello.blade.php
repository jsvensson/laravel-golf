@extends('layouts.default')

@section('content')
  <h1>Hello World!</h1>

@if(Session::has('flash_notice'))
  <div class="flash-notice">{{ Session::get('flash_notice') }}</div>
@endif

@if(Auth::check())
  <p>Inloggad som {{ Auth::user()->email }}</p>
@endif

  <ul>
    <li>{{ HTML::link('account/signup', 'Registrera konto') }}</li>
  @if(Auth::check())
    <li>{{ HTML::link('account/logout', 'Logga ut') }}</li>
  @else
    <li>{{ HTML::link('account/login', 'Logga in') }}</li>
  @endif

  </ul>

  <p>Todo: clean up static page views.</p>
@stop
