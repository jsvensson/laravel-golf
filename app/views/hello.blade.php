@extends('layouts.default')

@section('content')
  <h1>Hello World!</h1>

  <ul>
    <li><a href="{{ url('account/signup') }}">New account</a></li>
  </ul>

  <p>Todo: clean up static page views.</p>
@stop
