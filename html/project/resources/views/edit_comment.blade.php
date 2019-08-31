@extends('layouts.master')
@section('title')
  Social Media: Edit Comment
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action=" {{url("edit_comment_action")}}" style="border-style: solid; text-align:center; padding: 20px;">
                {{csrf_field()}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <h4>Edit Comment</h4>
                <input type="hidden" name="comment_id" value="{{ $comment->comment_id }}">
                <p><label>Username:</label><br><input type="text" name="username" value="{{$comment->username}}"></p>
                <p><label>Message:</label><br><textarea type="text" name="message">{{$comment->message}}</textarea></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>
@endsection