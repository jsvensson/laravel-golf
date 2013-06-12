@extends('layout.default')

@section('content')
  <h2>Inloggad användarprofil</h2>

<pre>
  {{ var_dump($user->full_name) }}
</pre>

<pre>
  {{ var_dump($user->permissions()) }}
</pre>

@stop
