<?php
namespace wad;

class Comment{
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

    //get comment
    function getComment(){
        return $this->comment;
    }
}
?>