<?php
namespace wad;

class Post{
    //variables
    protected $user;
    protected $comment;

    //constructor
    function __construct($user, $comment){
        $this->user = $user;
        $this->comment = $comment;
    }

    //functions

    //accessors
    //get user variable
    function getUser(){
        return $this->user;
    }

    //get message variable
    function getMessage(){
        return $this->message;
    }

}

?>