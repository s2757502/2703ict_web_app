@extends('layouts.master')
@section('title')
  Bootstrap example
@endsection
@section('content')
    
        <div class="row" id="content">
            <div class="col-md-4">
                <form method="post" action="{{url("xxx")}}">
                {{csrf_field()}}
                    <h3>Create Post</h3>
                    <p>
                        <label>Username:</label><br>
                        <input type="text" name="username">
                    </p>
                    <p>
                        <label>Title:</label><br>
                        <textarea type="text" name="title"></textarea>
                    </p>
                    <p>
                        <label>Message:</label><br>
                        <textarea type="text" name="message"></textarea>
                    </p>
                <input type="submit" value="Submit">
                </form>
            </div>
            <div class="col-md-8">
                <h3>Posts</h3>
                <p>Post1</p>
                <p>Post2</p>
                <p>Post3</p>
                <p>Post4</p>
                <p>Post5</p>
            </div>
        </div>

@endsection