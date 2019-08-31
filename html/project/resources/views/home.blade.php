@extends('layouts.master')
@section('title')
  Social Media
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-3">
            <h4>Create Post</h4>
            <form method="post" action="{{url("create_post_action")}}">
            {{csrf_field()}}
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
                <p><label>Username:</label><br><input type="text" name="username"></p>
                <p><label>Title:</label><br><textarea type="text" name="title"></textarea></p>
                <p><label>Message:</label><br><textarea type="text" name="message"></textarea></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-9">
            <h4>Posts</h4>
            @if ($posts)
                @foreach($posts as $post)
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
                        <div class="postCommentsNo">
                            <a href='{{url("post/$post->post_id")}}'>
                                {{$post->number_of_comments}} 
                                @if ($post->number_of_comments == 1)
                                    Comment.
                                @else
                                    Comments. 
                                @endif
                                Click to view post.
                            </a>
                        </div>
                    </div>
                @endforeach  
            @else
                No posts found.
            @endif   
        </div>
    </div>
</main>

@endsection