@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('add_players', $contest) }}

  <h2>Lägg till spelare till tävling</h2>

@stop
