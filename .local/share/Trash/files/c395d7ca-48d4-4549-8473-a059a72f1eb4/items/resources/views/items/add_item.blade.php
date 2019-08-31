@extends('layouts.master')
@section('title')
  Add Item
@endsection
@section('content')
    <h1>Add new item</h1>
    <form method="post" action="{{url("add_item_action")}}">
        {{csrf_field()}}
        <p>
            <label>Summary</label>
            <input type="text" name="summary">
        </p>
        <p>
            <label>Details</label>
            <textarea type="text" name="details"></textarea>
        </p>
        <input type="submit" value="Submit">
    </form>
@endsection