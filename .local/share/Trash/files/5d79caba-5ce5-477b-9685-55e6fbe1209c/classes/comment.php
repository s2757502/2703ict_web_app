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
    function getUser(){
        return $this->user;
    }

    function getComment(){
        return $this->comment;
    }
}

?>