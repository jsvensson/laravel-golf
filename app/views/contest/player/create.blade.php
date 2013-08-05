@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.create', $contest) }}

  <h2>Lägg till spelare till tävling</h2>

@stop
