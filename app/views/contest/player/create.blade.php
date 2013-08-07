@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.create', $contest) }}

  <h2>Lägg till spelare</h2>

  {{ Former::horizontal_open()
       ->action(URL::route('contest.player.store', $contest->id)) }}

  @foreach($nonmembers as $player)
    {{ Former::checkbox($player->id)
         ->label(null)
         ->text($player->full_name) }}
  @endforeach

  {{ Former::primary_large_submit()->value('Lägg till') }}

  {{ Former::close() }}


@stop
