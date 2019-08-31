@extends('layouts.master')
@section('title')
  Social Media: Post
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-3">
            <h4>Create Comment</h4>
            <form method="post" action="{{url("create_comment_action")}}">
            {{csrf_field()}}
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                <p><label>Username:</label><br><input type="text" name="username"></p>
                <p><label>Message:</label><br><textarea type="text" name="message"></textarea></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-9">
            <h4>Post</h4>
            <div class="post">
                <div class="postOptions">
                    <a href="{{url("edit_post/$post->post_id")}}">edit</a> | <a href="{{url("delete_post_action/$post->post_id")}}">delete</a>
                </div>
                <div class="postContents">
                    <img class="postImage" src="{{asset($post->icon)}}" width="150" alt="user image">
                    <div class="postText">
                        <span class="postUser">{{$post->username}}</span><br>
                        <span class="postDate">Created: {{date('d-m-Y H:i:s', $post->cdate)}} @isset($post->edate) Last Edited: {{date('d-m-Y H:i:s', $post->edate)}} @endisset</span><br>
                        <span class="postTitle">{{$post->title}}</span><br>
                        <span class="postMessage">{{$post->message}}</span>
                    </div>
                </div>
            </div>
            @if ($comments)
                <h4>Comments</h4>
                @foreach ($comments as $comment)
                    <div class="post">
                        <div class="postOptions">
                            <a href="{{url("edit_comment/$comment->comment_id")}}">edit</a> | <a href="{{url("delete_comment_action/$comment->comment_id")}}">delete</a>
                        </div>
                        <div class="postContents">
                            <div class="postText">
                                <span class="postUser">{{$comment->username}}</span><br>
                                <span class="postDate">Created: {{date('d-m-Y H:i:s', $comment->cdate)}} @isset($comment->edate) Last Edited: {{date('d-m-Y H:i:s', $comment->edate)}} @endisset</span><br>
                                <span class="postMessage">{{$comment->message}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</main>

@endsection