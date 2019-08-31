@extends('layouts.master')
@section('title')
  Social Media: Edit User
@endsection
@section('content')
<main role="main" class="container">
    <div class = "row" id = "content">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form method="post" action=" {{url("edit_user_action")}}" style="border-style: solid; text-align:center; padding: 20px;">
                {{csrf_field()}}
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <h4>Edit User</h4>
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <p><label>Username:</label><br><input type="text" name="username" value="{{$user->username}}"></p>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</main>
@endsection