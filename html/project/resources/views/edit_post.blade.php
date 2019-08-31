@extends('layouts.master')
@section('title')
  Social Media: Edit Post
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action=" {{url("edit_post_action")}}" style="border-style: solid; text-align:center; padding: 20px;">
                {{csrf_field()}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <h4>Edit Post</h4>
                <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                <p><label>Username:</label><br><input type="text" name="username" value="{{$post->username}}"></p>
                <p><label>Title:</label><br><textarea type="text" name="title">{{$post->title}}</textarea></p>
                <p><label>Message:</label><br><textarea type="text" name="message">{{$post->message}}</textarea></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>
@endsection