@extends('layouts.master')
@section('title')
  Associative array search results page
@endsection
@section('content')
  <h2>Australian Prime Ministers</h2>

    @if (count($pms) == 0) 
      <p>No results found.</p>
    @else
      <h4>Search result for: <u>{{$query}}</u></h4>
      <table class="bordered">
        <thead>
          <tr><th>No.</th><th>Name</th><th>From</th><th>To</th><th>Duration</th><th>Party</th><th>State</th></tr>
        </thead>
        <tbody>
          @foreach($pms as $pm) 
            <tr><td>{{$pm['index']}}</td><td>{{$pm['name']}}</td><td>{{$pm['from']}}</td><td>{{$pm['to']}}</td><td>{{$pm['duration']}}</td><td>{{$pm['party']}}</td><td>{{$pm['state']}}</td></tr>
          @endforeach
        </tbody>
      </table>
    @endif
  <p><a href="../public">New search</a></p>
  <hr>
@endsection