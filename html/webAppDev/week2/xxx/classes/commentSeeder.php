<?php
namespace wad;
use wad\Comment;
include 'comment.php';

//seeder class with mock data for testing purposes
class CommentSeeder{
    //function to create array of Comment objects with mock data
    public static function seed(){
        $c = [];
        $c[] = new Comment("Bob", "Nice post");
        $c[] = new Comment("Fred", "Yes");
        $c[] = new Comment("Fred", "NO");
        return $c;
    }
}
?>

