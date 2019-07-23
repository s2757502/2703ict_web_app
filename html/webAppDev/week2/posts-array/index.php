<?php
    $posts = array();
    $posts[] = array(
        'name' => 'Bob',
        'message' => 'Hello!',
        'image' => 'images/user.jpg',
        'date' => '1/1/11'
    );
    $posts[] = array(
        'name' => 'John',
        'message' => "It's a good day",
        'image' => 'images/user.jpg',
        'date' => '2/3/14'
    );
    $posts[] = array(
        'name' => 'Fred',
        'message' => 'Sunny day!',
        'image' => 'images/user.jpg',
        'date' => '4/5/16'
    );
    //var_dump($posts);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>title</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div id="content">
            <h1>Social Media</h1>
            <?php foreach($posts as $post) { ?>
                <div id="post">
                    <img src="<?= $post['image'] ?>" width="50" alt="user image">
                    <?= $post['name'] ?>
                    <?= $post['message'] ?>
                    <?= $post['date'] ?>
                </div>
            <?php } ?>
        </div>
    </body>
</html>