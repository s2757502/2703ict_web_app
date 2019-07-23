<?php
namespace wad;
use wad\Post;
include 'post.php';

//seeder class with mock data for testing purposes
class PostSeeder{
    //function to create array of Post objects with mock data
    public static function seed(){
        $posts = [];
        $posts[] = new Post('Bob', 'Hello', 'images/user.jpg', '1/1/11');
        $posts[] = new Post('John', "It's a good day.", 'images/user.jpg', '1/1/11');
        $posts[] = new Post('James', 'Another great day!', 'images/user.jpg', '1/1/11');
        return $posts;
    }
}
?>