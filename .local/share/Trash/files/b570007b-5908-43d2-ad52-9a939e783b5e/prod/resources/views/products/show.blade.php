@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->price }}</p>
    <p>{{ $product->manufacturer->name}}</p>
    @if (Auth::check())
        <p><a href='{{ url("product/$product->id/edit") }}'>Edit</a></p>
    @endif
    <p>
        <form method="POST" action='{{ url("product/$product->id") }}'>
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            @if (Auth::check())
                <input type="submit" value="Delete">
            @endif
        </form>
    </p>
    <p><a href='{{ url("product/$product->index") }}'>Home</a></p>
@endsection
