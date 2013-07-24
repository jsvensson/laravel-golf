@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('event', $event) }}

  <h2>{{ $event->name }}</h2>

  <p>Tillhör tävling {{ $event->contest->name }}</p>

@stop
