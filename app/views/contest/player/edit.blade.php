@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.edit', $contest, $player) }}

  {{ Former::open()
      ->action(URL::route('contest.player.update', [$contest->id, $player->id]))
      ->method('put') }}

  @if($player->tees()->count() > 0)
    <table>
      <tr>
        @foreach($player->teesForContest($contest)->get() as $event)
          <th>{{ $event->name }}</th>
        @endforeach
      </tr>
      <tr>
    @foreach($results as $result)
      <td><input type="number" name="result[{{ $result->id }}][score]" value="{{ $result->score }}"></td>
    @endforeach
      </tr>
    </table>
  @endif

  {{ Former::submit()->value('Spara poäng') }}

  {{ Former::close() }}

@stop
