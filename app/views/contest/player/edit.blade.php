@extends('layout.default')

@section('content')

  {{ Breadcrumbs::render('contest.player.edit', $contest, $player) }}

  {{ Former::open()
      ->action(URL::route('contest.player.update', [$contest->id, $player->id]))
      ->method('put') }}

  @if($player->events()->count() > 0)
    <table>
      <tr>
        @foreach($player->eventsForContest($contest->id)->get() as $event)
          <th>{{ $event->name }}</th>
        @endforeach
      </tr>
      <tr>
    @foreach($player->eventsForContest($contest->id)->get() as $event)
      <td><input type="number" name="events[{{ $event->id }}][score]" value="{{ $event->score }}"></td>
    @endforeach
      </tr>
    </table>
  @endif

  {{ Former::submit()->value('Spara poäng') }}

  {{ Former::close() }}

@stop
