<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTES
// [NAVBAR START]
// To Do: Display Home Page [NAVBAR]
Route::get('/', function() {
    $posts = get_posts();
    return view('home')->with('posts', $posts);
});

// To Do: Display Unique Users Page [NAVBAR]
Route::get('users', function() {
    $users_with = get_users_with_posts();
    $users_without = get_users_without_posts();
    return view('users')->with('users_with', $users_with)->with('users_without', $users_without);
});

// To Do: Display Recent Posts Page [NAVBAR]
Route::get('recent_posts', function() {
    $posts = get_recent_posts();
    return view('recent_posts')->with('posts', $posts);
});

// To Do: Display Documentation Page [NAVBAR]
Route::get('documentation', function() {
    return view('documentation');
});
// [NAVBAR END]

// To Do: Display User Posts Page
// When a user clicks on a post in the users view, it will take them to a view that displays that user's posts 
Route::get('user_posts/{user_id}', function($id) {
    $posts = get_user_posts($id);
    $user = get_user_of_id($id); 
    return view('user_posts')->with('posts', $posts)->with('user', $user);
});

// To Do: Display Post Page (view comments of post)
// Display the comments of a post, with the posts at the top
Route::get('post/{post_id}', function($id) {
    $post = get_post($id);
    $comments = get_comments($id);
    return view('post')->with('post', $post)->with('comments', $comments);
});

// To Do: Display Edit Post Page
Route::get('edit_post/{id}', function($id) {
    $post = get_post($id);
    return view("edit_post")->with('post', $post);
});

// To Do: Display Edit Comment Page
Route::get('edit_comment/{id}', function($id) {
    $comment = get_comment($id);
    return view("edit_comment")->with('comment', $comment);
});

// To Do: Display Edit User Page
Route::get('edit_user/{id}', function($id) {
    $user = get_user_of_id($id);
    return view("edit_user")->with('user', $user);
});

// To Do: Update the contents of a post in the DB. Display post page if successful, display error if unsuccessful. 
Route::post('edit_post_action', function() {
    $edate = time();
    $error = NULL;

    // Request Form Data
    $id = request('post_id');
    $username = request('username');
    $title = request('title');
    $message = request('message');
    $post = get_post($id);

    if (empty($id)) {
        $error =  "Something has gone wrong. Try refreshing the page.";
    }
    else if (empty($message) && empty($title) && $post->username != $username) {
        $error =  "Please make sure your username is typed correctly and your title and message aren't blank.";
    }
    else if (empty($title) || empty($message)) {
        $error =  "The title and message cannot be blank!";
    }
    else if ($post->username != $username){
        $error = "Your username does not match the creator of this post. Please make sure your username is typed correctly.";
    }

    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        edit_post($id, $title, $message, $edate);
        return redirect(url("post/$id"));
    }
});

// To Do: Update the contents of a comment in the DB. Display post page if successful, display error if unsuccessful. 
Route::post('edit_comment_action', function() {
    $edate = time();
    $error = NULL;

    // Request Form Data
    $id = request('comment_id');
    $username = request('username');
    $message = request('message');
    $comment = get_comment($id);

    if (empty($id)) {
        $error =  "Something has gone wrong. Try refreshing the page.";
    }
    else if (empty($message) && $comment->username != $username) {
        $error =  "Please make sure your username is typed correctly and your message isn't blank.";
    }
    else if (empty($message)) {
        $error =  "A message cannot be blank!";
    }
    else if ($comment->username != $username){
        $error = "Your username does not match the creator of this comment. Please make sure your username is typed correctly.";
    }

    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        edit_comment($id, $message, $edate);
        $post_id = get_post_id_of_comment($id);
        return redirect(url("post/$post_id"));
    }
});

// To Do: Update a user in the DB. Display user page if successful, display error if unsuccessful. 
Route::post('edit_user_action', function() {
    // Error message for query (null if  valid)
    $error = NULL;

    // Request Form Data
    $id = request('user_id');
    $username = request('username');

    if (empty($id)) {
        $error =  "Something has gone wrong. Try refreshing the page.";
        return redirect()->back()->with('error', $error);
    }
    else if (empty($username)) {
        $error =  "You have not entered a valid username.";
    }
    else if (get_user_of_id($id)->username == $username) {
        $error =  "Your username is the same.";
    }
    else if (user_exists($username)) {
        $error =  "That user already exists.";
    }
    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        edit_user($id, $username);
        return redirect(url("users"));
    }
});

// To Do: Create New Post. Display updated Home Page if successful, display error if unsuccessful.
Route::post('create_post_action', function() {
    $cdate = time();
    $error = NULL;
    // Request Form Data
    $username = request('username');
    $title = request('title');
    $message = request('message');

    //INPUT VALIDATION
    // Check if username field is empty
    if (empty($username)) {
        $error =  "You have not entered a valid username.";
    }
    // Check if title or message are empty
    else if (empty($title) || empty($message)){
        $error = "A post must have a valid title and a message.";
    }

    // Return error if it exists
    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        // Add Post to DB
        $post = add_post($username, $title, $cdate, $message);

        // Check if add was successful
        if($post) {
            return redirect(url("/"));
        }
        else {
            die("Error while adding comment.");
        }
    }
});

// To Do: Create New User. Display updated Home Page if successful, display error if unsuccessful.
Route::post('create_user_action', function() {
    $error = NULL;
    // Request Form Data
    $username = request('username');

    //INPUT VALIDATION
    // Check if username field is empty
    if (empty($username)) {
        $error =  "You have not entered a valid username.";
    }
    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        // Tries to add user to the database. If user already exists, will return false. 
        $user_exists = create_user($username);

        // Check if the user already exists. If user already exists, return error message
        if(!$user_exists) {
            $error = "User already exists!";
            return redirect()->back()->with('error', $error);
        }
        else {
            return redirect(url("users"));
        }
    }
});

// To Do: Create New Comment. Display updated Post Page if successful, display error if unsuccessful.
Route::post('create_comment_action', function() {
    $cdate = time();
    $error = NULL;
    // Request Form Data
    $post_id = request('post_id');
    $username = request('username');
    $message = request('message');

    //INPUT VALIDATION
    // Check if username field is empty
    if (empty($username)) {
        $error =  "You have not entered a valid username.";
    }
    // Check if title or message are empty
    else if (empty($message)){
        $error = "A comment must have a valid message.";
    }

    // Return error if it exists
    if ($error != NULL){
        return redirect()->back()->with('error', $error);
    }
    else {
        // Add Post to DB
        $comment = add_comment($username, $post_id, $cdate, $message);

        // Check if add was successful
        if($comment) {
            return redirect(url("post/$post_id"));
        }
        else {
            die("Error while adding comment.");
        }
    }
});

// To Do: Delete User from the DB
Route::get('delete_user_action/{id}', function($id) {
    delete_user_comments($id);
    delete_user_posts($id);
    delete_user($id);   
    
    return redirect(url("users"));
});

Route::get('delete_comment_action/{id}', function($id) {
    $post_id = get_post_id_of_comment($id);
    delete_comment($id);
    return redirect(url("post/$post_id"));
});

Route::get('delete_post_action/{id}', function($id) {
    delete_children($id);
    delete_post($id);
    return redirect(url("/"));
});

// FUNCTIONS

// Accessors

// Get all comments
// Return all comments for a particular post
function get_comments($id) {
    $sql = "select * from Comment, User where Comment.post_id=? and Comment.user_id = User.user_id";
    $comments = DB::select($sql, array($id));
    return $comments;
}

// Get username of ID
// Return the username of a specific ID
function get_user_of_id($id) {
    $sql = "select * from User where user_id=?";
    $user = DB::select($sql, array($id));
    $user = $user[0];
    return $user;
}

// Get all posts
// Return all posts from newest to oldest (top to bottom)
function get_posts(){
    $sql = "SELECT Post.*, User.username, COUNT(Comment.comment_id) as number_of_comments       
            FROM Post, User
            LEFT JOIN Comment
            ON (Post.post_id = Comment.post_id)
            WHERE Post.user_id = User.user_id
            GROUP BY Post.post_id
            ORDER BY cdate DESC";
    $posts = DB::select($sql);
    return $posts;
}

// Get all posts created in last 7 days
// Return all posts from newest to oldest (top to bottom) from the last 7 days
function get_recent_posts(){
    $weekago = get_time_week_ago();
    $sql = "SELECT Post.*, User.username, COUNT(Comment.comment_id) as number_of_comments       
            FROM Post, User
            LEFT JOIN Comment
            ON (Post.post_id = Comment.post_id)
            WHERE Post.user_id = User.user_id AND Post.cdate >= ?
            GROUP BY Post.post_id
            ORDER BY cdate DESC";
    $posts = DB::select($sql, array($weekago));
    return $posts;
}

// Get the time a week ago from current timestamp
function get_time_week_ago(){
    // Seconds in a week
    $week = 604800;

    $weekago = time()-$week;
    return $weekago;
}

// Get a post
// Return a particular post (knowing ID)
function get_post($id) {
    $sql = "select * from Post, User where Post.post_id=? and Post.user_id = User.user_id";
    $posts = DB::select($sql, array($id));
    if (count($posts) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $post = $posts[0];
    return $post;
}

// Get the posts for a particular user(id)
function get_user_posts($id){
    $sql = "SELECT Post.*, User.username, COUNT(Comment.comment_id) as number_of_comments       
            FROM Post, User
            LEFT JOIN Comment
            ON (Post.post_id = Comment.post_id)
            WHERE Post.user_id = User.user_id AND User.user_id = ?
            GROUP BY Post.post_id
            ORDER BY cdate DESC";
    $posts = DB::select($sql, array($id));
    return $posts;
}

// Get the post id of the post the comment is a child of 
function get_post_id_of_comment($id){
    $sql = "select post_id from Comment where comment_id=?";
    $postid = DB::select($sql, array($id));
    if (count($postid) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $postid = $postid[0]->post_id;
    return $postid;
}

// Get a comment
// Return a particular comment (knowing ID)
function get_comment($id) {
    $sql = "select * from Comment, User where Comment.comment_id=? and Comment.user_id = User.user_id";
    $comments = DB::select($sql, array($id));
    if (count($comments) != 1){
        die("Something has gone wrong, invalid query or result: $sql");
    }
    $comment = $comments[0];
    return $comment;
}

// Get all Users with posts
function get_users_with_posts(){
    $sql = "SELECT User.*, Post.*, COUNT(Post.post_id) as number_of_posts      
            FROM User, Post
            WHERE User.user_id = Post.user_id
            GROUP BY User.user_id
            ORDER BY username ASC";
    $users = DB::select($sql);
    return $users;
}

// Get all Users without posts
function get_users_without_posts(){
    $sql = "SELECT * FROM User
            WHERE NOT EXISTS(SELECT User.user_id    
                            FROM Post
                            WHERE User.user_id = Post.user_id)
            ORDER BY username ASC";
    $users = DB::select($sql);
    return $users;
}

// Get User ID 
// Check if user exists and return ID of user (return NULL if doesn't exist)
function get_user_id($username){
    $sql = "select user_id from User where username=?";
    $user = DB::select($sql, array($username));

    // If user doesn't exist, return null
    if (empty($user)){
        return NULL;
    }

    // Check for unanticipated result
    else if (count($user) != 1){
        die("Something has gone wrong, try creating another username.");
    }

    // return the ID of the user
    else {
        $userid = $user[0]->user_id;
        return($userid);
    }
}

// Check if a user exists
function user_exists($username){
    $sql = "select user_id from User where username=?";
    $user_id = DB::select($sql, array($username));
    if (empty($user_id)) {
        return false;
    }
    else {
        return true;
    }
}

// Mutators

// Add Post
// Add post (tuple) to database, return ID of post (tuple) in database
function add_post($username, $title, $cdate, $message){
    // Check if the user exists
    $userid = get_user_id($username);

    // If the user doesn't exist, create new user
    if ($userid == NULL){
        $userid = add_user($username);
    }

    // Create the post
    $sql = "insert into Post (cdate, user_id, title, message) values (?, ?, ?, ?)";
    DB::insert($sql, array($cdate, $userid, $title, $message));
    $id = DB::getPdo()->lastInsertId();

    return($id);
}

// Add Comment
// Add comment (tuple) to database, return ID of post (tuple) in database
function add_comment($username, $post_id, $cdate, $message){
    // Check if the user exists
    $user_id = get_user_id($username);

    // If the user doesn't exist, create new user
    if ($user_id == NULL){
        $user_id = add_user($username);
    }

    // Create the post
    $sql = "insert into Comment (cdate, user_id, post_id, message) values (?, ?, ?, ?)";
    DB::insert($sql, array($cdate, $user_id, $post_id, $message));
    $id = DB::getPdo()->lastInsertId();
    
    return($id);
}

// Will new unique users to the database and return true. If user already exists will return false.
function create_user($username){
    // Check if the user exists
    $user_id = get_user_id($username);

    // If the user doesn't exist, create new user
    if ($user_id == NULL){
        $user_id = add_user($username);
        return true;
    }
    // Else the user already exists. In which case, return false because the user wasn't added.
    else {
    return false;
    }
}

// Add User
// Add a user to the DB
function add_user($username){
    $sql = "insert into User (username) values (?)";
    DB::insert($sql, array($username));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}

// Update User
// Modify the user in the DB
function edit_user($id, $username) {
    $sql = "update User set username = ? where user_id = ?";
    DB::update($sql, array($username, $id));
}

// Update Post
// Modify the post in the DB
function edit_post($id, $title, $message, $edate) {
    $sql = "update Post set title = ?, message = ?, edate = ? where post_id = ?";
    DB::update($sql, array($title, $message, $edate, $id));
}

// Update Comment
// Modify the comment in the DB
function edit_comment($id, $message, $edate) {
    $sql = "update Comment set message = ?, edate = ? where comment_id = ?";
    DB::update($sql, array($message, $edate, $id));
}

// Delete the comments of a user from the DB
function delete_user_comments($id) {
    $sql = "delete from Comment where user_id = ?";
    DB::delete($sql, array($id));
}

// Delete the posts of a user from the DB
function delete_user_posts($id) {
    $sql = "delete from Post where user_id = ?";
    DB::delete($sql, array($id));
}

// Delete the user from the DB
function delete_user($id) {
    $sql = "delete from User where user_id = ?";
    DB::delete($sql, array($id));
}

// Delete a particular comment
function delete_comment($id) {
    $sql = "delete from Comment where comment_id = ?";
    DB::delete($sql, array($id));
}

// Delete the comments of a post
function delete_children($id) {
    $sql = "delete from Comment where post_id = ?";
    DB::delete($sql, array($id));
}

// Delete a post
function delete_post($id) {
    $sql = "delete from Post where post_id = ?";
    DB::delete($sql, array($id));
}