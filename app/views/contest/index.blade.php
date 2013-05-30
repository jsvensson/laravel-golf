@extends('layout.default')

@section('content')

  <h2>Aktiva tävlingar</h2>

  <p>Visar endast icke-slutna tävlingar samt slutna tävlingar man deltar i.</p>

  <table class="table table-condensed">
    <tr>
      <th>Namn</th>
      <th>Öppnar</th>
      <th>Stänger</th>
      <th>Skapare</th>
      <th>Deltagare</th>
    </tr>
@foreach ($contests as $contest)
    <tr>
      <td><a href="{{ url('contest/show/' . $contest->id) }}"><?= $contest->name ?></a></td>
      <td><?= $contest->start_date ?></td>
      <td><?= $contest->end_date ?></td>
      <td><a href="{{ url('player/' . $contest->owner->id) }}"><?= $contest->owner->initial_name ?><a></td>
      <td><?= $contest->player_count ?></td>
    </tr>
@endforeach
  </table>


@stop
