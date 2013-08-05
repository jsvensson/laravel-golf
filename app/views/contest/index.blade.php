@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.index') }}

  <h2>Aktiva tävlingar</h2>

  <p>Visar endast icke-slutna tävlingar samt slutna tävlingar man deltar i.</p>

  <table class="table table-condensed">
    <tr>
      <th>Namn</th>
      <th>Öppnar</th>
      <th>Stänger</th>
      <th>Skapare</th>
      <th>Deltagare</th>
      <th>Events</th>
    </tr>
@foreach ($contests as $contest)
    <tr>
      <td><a href="{{ route('contest.show', $contest->id) }}">{{ $contest->name }}</a></td>
      <td>{{ $contest->start_date }}</td>
      <td>{{ $contest->end_date }}</td>
      <td><a href="{{ route('player.show', $contest->owner->id) }}">{{ $contest->owner->initial_name }}<a></td>
      <td>{{ $contest->players->count() }}</td>
      <td>{{ $contest->events->count() }}</td>
    </tr>
@endforeach
  </table>

@stop
