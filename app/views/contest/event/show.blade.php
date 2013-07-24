@extends('layout.default')

@section('content')

  <div class="breadcrumb">
    <a href="">Mina tävlingar</a> &rarr;
    <a href="{{ URL::route('contest.show', $event->contest->id) }}">{{ $event->contest->name }}</a> &rarr;
    <a href="{{ URL::route('contest.event.show', [$event->contest->id, $event->id]) }}">{{ $event->name }}</a>
  </div>

  <h2>{{ $event->name }}</h2>

  <p>Tillhör tävling {{ $event->contest->name }}</p>

@stop
