@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.create', $contest) }}

  <h2>Lägg till spelare</h2>

  <ul>
  @foreach($nonmembers as $player)
    <li>{{ $player->full_name }}</li>
  @endforeach
  </ul>

@stop
