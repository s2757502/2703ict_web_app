@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
<ul>
    @foreach ($products as $product)
        <a href="product/{{$product->id}}"><li>{{ $product->name }}</li>
    @endforeach
</ul>
@if (Auth::check())
    <a href='{{ url("product/create") }}'>Create New Product</a>
@endif
@endsection