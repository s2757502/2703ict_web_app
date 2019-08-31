@extends('layouts.master')
@section('title')
  Item Details
@endsection
@section('content')
    <input type="hidden" name="id" value="{{ $item->id }}">
    <h1>{{$item->summary}}</h1>
    <p>{{$item->details}}</p>

    <p><a href="{{url("delete_item_action/$item->id")}}">Delete Item</a></p>
    <p><a href="{{url("update_item/$item->id")}}">Update Item</a></p>
    <p><a href="{{url("/")}}">Home</a></p>
@endsection