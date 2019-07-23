<?php
namespace wad;

class Post{
    //variables
    protected $user;
    protected $message;
    protected $date;
    protected $image;
    protected $comments;

    //constructor
    function __construct($user, $message, $image, $date){
        $this->user = $user;
        $this->message = $message;
        $this->date = $date;
        $this->image = $image;
        $this->comments = [];
    }

    //functions

    //mutators
    //add comment variable
    function addComment($user, $comment){
        $this->comments[] = array("user"=> $user, "comment" => $comment);
    }

    //accessors
    //get user variable
    function getUser(){
        return $this->user;
    }

    //get message variable
    function getMessage(){
        return $this->message;
    }

    //get image variable
    function getImage(){
        return $this->image;
    }

    //get data variable
    function getDate(){
        return $this->date;
    }

    //get comments
    function getComment(){
        return $this->comments;
    }
}
?>