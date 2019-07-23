<?php
namespace wap;

class Post{
    protected $user;
    protected $message;
    protected $date;
    protected $image;

    function __construct($user, $message, $image, $date){
        $this->user = $user;
        $this->message = $message;
        $this->date = $date;
        $this->image = $image;
    }

    function getUser(){
        return $this->user;
    }

    function getMessage(){
        return $this->message;
    }

    function getImage(){
        return $this->image;
    }

    function getDate(){
        return $this->date;
    }
}
?>