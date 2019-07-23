<?php
namespace wap;
use wap\Post;
include 'post.php';

class PostSeeder{
    public static function seed(){
        $posts = [];
        $posts[] = new Post('Bob', 'Hello', 'images/user.jpg', '1/1/11');
        $posts[] = new Post('John', "It's a good day.", 'images/user.jpg', '1/1/11');
        $posts[] = new Post('James', 'No message', 'images/user.jpg', '1/1/11');
        return $posts;
    }
}
?>