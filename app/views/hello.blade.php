@extends('layout.default')

@section('content')

<div class="jumbotron">
  <h1>Golf</h1>
  <p>Svinga en klubba, träffa dina vänner!</p>
</div>

<div class="row">
  <div class="col-md-4">
    @if( ! empty($user))
      <p>Inloggad som {{ $user->full_name }}</p>
    @endif

      <ul>
      @if( ! empty($user))
        <li>{{ HTML::link('auth/logout', 'Logga ut') }}</li>
      @else
        <li>{{ HTML::link('auth/signup', 'Registrera konto') }}</li>
        <li>{{ HTML::link('auth/login', 'Logga in') }}</li>
      @endif

      </ul>
  </div>

  <div class="col-md-4"><h4>Senaste aktiviteter</h4></div>

  <div class="col-md-4">
    <h4>Statistik</h4>
    <ul>
      <li>Users: {{ $count['users'] }}</li>
      <li>Contests: {{ $count['contests'] }}</li>
      <li>Events: {{ $count['events'] }}</li>
    </ul>
  </div>
</div>

@stop
