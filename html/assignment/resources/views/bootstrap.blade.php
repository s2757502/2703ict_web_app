@extends('layouts.master')
@section('title')
  Bootstrap example
@endsection
@section('content')
    <div class="container">
        <div class="row" id="navbar">
            <div class="col-md-6">Home</div>
            <div class="col-md-2">Unique</div>
            <div class="col-md-2">Recent</div>
            <div class="col-md-2">Documentation</div>
        </div>
        <div class="row" id="content">
            <div class="col-md-4">
                <label>Name:</label><br><input type="text"><br>
                <label>Message:</label><br><input type="text"><br>
            </div>
            <div class="col-md-8">
                <h3>John Smith</h3>
                <p>Post1</p>
                <p>Post2</p>
                <p>Post3</p>
                <p>Post4</p>
                <p>Post5</p>
            </div>
        </div>
    </div>
@endsection