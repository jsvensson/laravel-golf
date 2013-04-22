@extends('layout.default')

@section('content')
  <h2>Inloggad användarprofil</h2>

<pre>{{ var_dump(Auth::user()) }}</pre>

@stop
