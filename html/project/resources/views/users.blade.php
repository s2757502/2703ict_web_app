@extends('layouts.master')
@section('title')
  Social Media: Users
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-3">
            <h4>Create User</h4>
            <form method="post" action="{{url("create_user_action")}}">
            {{csrf_field()}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <p><label>Username:</label><br><input type="text" name="username"></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-9">
            <h4>Users with Posts</h4>
            @if ($users_with)
                @foreach($users_with as $user)
                    <div class="post">
                        <div class="postOptions">
                            <a href="{{url("edit_user/$user->user_id")}}">edit</a> | <a href="{{url("delete_user_action/$user->user_id")}}">delete</a>
                        </div>
                        <div class="postContents">
                            <img class="postImage" src="{{asset($user->picture)}}" width="150" alt="user image">
                            <div class="postText">
                                <span class="postUser">{{$user->username}}</span><br>
                                <span class="postTitle">
                                    <a href='{{url("user_posts/$user->user_id")}}'>
                                        {{$user->number_of_posts}}
                                        @if ($user->number_of_posts == 1)
                                            post
                                        @else
                                            posts
                                        @endif
                                            by this user. Click to view.
                                    </a>
                                </span><br>
                            </div>
                        </div>
                    </div>
                @endforeach  
            @else
                No users found.
            @endif
            <h4>Users without Posts</h4>
            @if ($users_without)
                @foreach($users_without as $user)
                    <div class="post">
                        <div class="postOptions">
                            <a href="{{url("edit_user/$user->user_id")}}">edit</a> | <a href="{{url("delete_user_action/$user->user_id")}}">delete</a>
                        </div>
                        <div class="postContents">
                            <img class="postImage" src="{{asset($user->picture)}}" width="150" alt="user image">
                            <div class="postText">
                                <span class="postUser">{{$user->username}}</span><br>
                                <span class="postMessage">0 posts by this user.</span><br>
                            </div>
                        </div>
                    </div>
                @endforeach  
            @else
                No users found.
            @endif 
        </div>
    </div>
</main>

@endsection