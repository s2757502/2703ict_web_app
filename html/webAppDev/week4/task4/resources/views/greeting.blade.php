@extends('layouts.master')
@section('title')
  Greeting
@endsection
@section('content')
  <p>
  Hello {{$name}}.
  Next year, you will be {{$age}} years old.
  <hr>
@endsection


