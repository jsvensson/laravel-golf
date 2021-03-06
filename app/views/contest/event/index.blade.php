@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.event.index', $contest) }}

  <h2>Events för {{ $contest->name }}</h2>

  <ul>
  @foreach($contest->tees()->get() as $event)
    <li><a href="{{ URL::route('contest.event.show', [$event->contest->id, $event->id]) }}">{{ $event->name }}</a></li>
  @endforeach
  </ul>

@stop
