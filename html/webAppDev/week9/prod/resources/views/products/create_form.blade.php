@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
<form method="POST" action='{{ url("product") }}'>
    {{ csrf_field() }}
    <p><label>Name: </label><input type="text" name="name" value="{{ old('name') }}">@if($errors->has('name')) <span class="alert"><strong>{{$errors->first('name')}}</strong></span>@endif</p>
    <p><label>Price: </label><input type="text" name="price" value="{{ old('price') }}">@if($errors->has('price')) <span class="alert"><strong>{{$errors->first('price')}}</strong></span>@endif</p>
    <p><select name="manufacturer">
    @foreach($manufacturers as $manufacturer)
        @if($manufacturer->id == old('manufacturer'))
            <option value="{{ $manufacturer->id }}" selected="selected">{{$manufacturer->name}}</option>
        @else
            <option value="{{ $manufacturer->id }}">{{$manufacturer->name}}</option>
        @endif
    @endforeach
    </select>
    @if($errors->has('manufacturer')) <span class="alert"><strong>{{$errors->first('manufacturer')}}</strong></span>@endif</p>
    <input type="submit" value="Create">
</form>
@endsection