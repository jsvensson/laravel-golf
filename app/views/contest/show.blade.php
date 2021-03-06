@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.show', $contest) }}

  <h2>{{ $contest->name }}</h2>

  <ul>
    <li>Skapare: <a href="{{ route('contest.player.show', [$contest->id, $contest->owner->id]) }}">{{ $contest->owner->full_name }}</a></li>
    <li><a href="{{ route('contest.player.index', $contest->id) }}">Visa {{ $contest->players->count() }} deltagare</a></li>
    <li><a href="{{ URL::route('contest.event.index', $contest->id) }}">Visa {{ $contest->tees->count() }} events</a></li>
@if($user)
    <li><a href="{{ route('contest.player.edit', [$contest->id, $user->id]) }}">Redigera mina events</a></li>
@endif
  </ul>

@if($is_owner)
  <h3>Ägar-kontroller</h3>
  <ul>
    <li><a href="{{ route('contest.player.create', $contest->id) }}">Lägg till spelare</a></li>
    <li><a href="{{ route('contest.event.create', $contest->id) }}">Skapa event</a></li>
    <li><a href="{{ route('contest.edit', $contest->id) }}">Redigera tävling</a></li>
  </ul>
@endif

  <table class="table table-condensed table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Spelare</th>
      @foreach($contest->tees as $tee)
        <th>{{ $tee->name }}</th>
      @endforeach
        <th>Summa</th>
      </tr>
    </thead>
    @foreach($contest->players as $player)
    <tr>
      <td class="contest contest-player">{{ $player->initial_name }}</td>
      @foreach($player->results()->forContest($contest)->get() as $result)
        @if($result->score)
          <td class="contest contest-score">{{ $result->score }}</td>
        @else
          <td class="contest contest-noscore">&mdash;</td>
        @endif
      @endforeach
      <td class="contest contest-result">{{ $player->results()->forContest($contest)->sum('score') }}</td>
    </tr>
    @endforeach
  </table>

@stop
