@extends('layouts.master')
@section('title')
  Social Media: Documentation
@endsection

@section('content')
<div class="col-md-12">
<img class="docimage" src="{{asset('/images/erdiagram.png')}}" alt="database image">
<p>
    All design and technical requirements have been implemented. Additionally,
    there were some liberties taken with the assignment:
</p>
<ul>
  <li>
      Users are stored separately in another table from posts and comments.
      This was an assumption made since users should be able to create posts and
      comments. Doing this, however, means that deleting a post or comment will
      NOT delete the user. Instead, users can be deleted on the user page.
  </li>
  <li>
    Users (Usernames) must be unique. The system will check if a username exists.
    If it exists, it will create the post or comment that references that user’s id. When
    a user is created through the user form, it will return an error if it
    already exists.
  </li>
  <li>
    Users can be created on the user page with the form, as well as in the
    comment or post forms.
  </li>
  <li>
      Dates are generated and stored by the system as a unix timestamp.
  </li>
  <li>
      Posts and comments include a creation date and an edit date (date of last
      edit).
    </li>
</ul>
<p>
    <strong>Design Requirements:</strong>
</p>
<p>
    <strong><u>1-1</u>:</strong>
    <em>
        All pages must have a navigation menu, either across the top of the
        page or down the left or right column.
    </em>
</p>
<p>
    The navbar was put in the master layout and inherited by the children
    pages. The active page is highlighted.
</p>
<p>
    <strong><u>1-2</u>: </strong>
    <em>
        The home page must display all posts. Only posts should be displayed,
        not comments.
    </em>
    <br/>
    <br/>
    The homepage selects all the posts from the database and the users that
    created them. They are displayed from newest to oldest by ordering the
    creation date (cdate) in descending order. The user can create a new post
    with the form.
</p>
<p>
    <strong><u>1-3</u>: </strong>
    <em>
        Next to each post there should be a number indicating how many comments
        are there for this post.
    </em>
</p>
<p>
    Each post displays how many comments it has. This is done with an SQL count
    function.
</p>
<p>
    <strong><u>1-4</u>: </strong>
    <em>
        From the home page, clicking on a post will bring up the comments page.
        The comments page for a post should contain that post and all comments
        for that post.
    </em>
    <strong></strong>
</p>
<p>
    When a user clicks on a post, the ‘post’ view is returned which displays
    the post with the comments of that post. The user can create a comment here
    with the form.
</p>
<p>
    <strong><u>1-5</u>:</strong>
    <em>
        The home page must display a form for the user to create a new post.
        Each post should contain a title, a message, a date, an icon, and a
        user’s name (the user is not required to login, they can simply enter
        their name in the post form). All posts can have the same icon. When
        creating a new post, user must enter the title, message, and user’s
        name. Date can either be entered or generated by the system. After a
        new post is successfully created, it should redirect back to the home
        page.
    </em>
</p>
<p>
    The tables in the database:
</p>
<img class="docimage" src="{{asset('/images/databases.png')}}" alt="database image">
<p>
    The cdate is the creation date and the edate is the edit date. By keeping
    track of these two attributes, it is possible to display both dates in a
    post. Dates are generated and stored as a unix timestamp.
</p>
<p>
    There are multiple forms in the website. The post form allows users to
    create a user and post.
</p>
<p>
    <strong><u>1-6</u>:</strong>
    <em>
        Users can edit posts. After a post is edited, the comments page for
        that post is displayed.
    </em>
</p>
<p>
    Users can edit posts on a new page. The username must match before they can
    make an alteration, however.
</p>
<p>
    <strong><u>1-7</u>: </strong>
    <em>
        Users can delete posts. When user deletes a post, the comments for that
        post should also be deleted.
    </em>
</p>
<p>
    Users can delete posts with a simple click. The comments of that post are
    also deleted by deleting any comment that references the deleted post’s id.
</p>
<p>
    <strong><u>1-8</u>: </strong>
    <em>
        Users can add comments to a post. A comment must have a message and a
        user, but no title.
    </em>
</p>
<p>
    There is a form on the post page that allows users to enter a username and
    a message. The comment will then be added below the previous comment (or
    post if no comments exist).
</p>
<p>
    <strong><u>1-9</u>: </strong>
    <em>Users can delete comments.</em>
</p>
<p>
    Users can delete comments with a simple click.
</p>
<p>
    <strong><u>1-10</u>: </strong>
    <em>
        There is a page that lists all unique users that have made a post (i.e.
        a user is only displayed once no matter how many posts this user has
        made). Clicking on the user should display all posts made by that user.
    </em>
</p>
<p>
    All users in the user table are displayed. They are separated into two
    groups: 1) users with a post, 2) users with no posts. Clicking on them
    displays a page with their posts.
</p>
<p>
    <strong><u>1-11</u>: </strong>
    <em>
        There is a most recent page, which shows only the posts that have been
        made in the last 7 days.
    </em>
</p>
<p>
    All posts made within a week are displayed on this page. This is done by
    calculating the time a week ago in a unix timestamp and using a greater
    than or equal to operation to check if the post was created after that
    timestamp.
</p>
<p>
    <strong>Technical Requirements:</strong>
</p>
<p>
    <strong><u>2-1</u>:</strong>
    <em>
        This assignment must be implemented using Laravel. Database access
        should be implemented via raw SQL and executed through Laravel’s DB
        class. You are not to use Laravel's ORM (ORM will be used for
        assignment 2).
    </em>
</p>
<p>
    The assignment was completed using Laravel and all other specifications
    were followed.
</p>
<p>
    <strong><u>2-2</u>: </strong>
    <em>
        An SQL file should be used to create tables and insert initial data.
        There should be enough initial data to thoroughly test the retrieval,
        update, and deletion functionalities you have implemented.
    </em>
</p>
<p>
    The SQL file contains enough data to test functionality.
</p>
<p>
    <strong><u>2-3</u>: </strong>
    <em>
        All input must be validated; validation errors message must be
        displayed within the view.
    </em>
</p>
<p>
    Users are redirected back to the form page and a message is clearly
    displayed that explains the error.
</p>
<p>
    <strong><u>2-4</u>: </strong>
    <em>
        Proper security measures must be implemented, e.g. perform HTML and SQL
        sanitisation etc. You should be able to explain the security measures
        you have implemented.
    </em>
    <strong></strong>
</p>
<p>
    CSRF tokens are used to make sure that external third parties can’t
    generate fake requests.
</p>
<p>
    Blade curly brackets statements are automatically sent through PHP's
    htmlspecialchars function to prevent XSS attacks.
</p>
<p>
    Parameter binding is used to protect the database against SQL injection.
</p>
<p>
    <strong><u>2-5</u>:</strong>
    <em>
        Template inheritance must be properly used. The tables in the database:
    </em>
</p>
<p>
    The nav bar and other elements are in the master layout and are inherited by
    all pages. The title is overridden.
</p>
<p>
    <strong><u>2-6</u>:</strong>
    Good coding practice is expected.
</p>
<p>
    Names for files, functions, variables, etc are consistent. Code is indented
    and spaced to improve legibility. Comments are descriptive.
</p>
<table>
  <tr>
    <th>Req. ID No.</th>
    <th>Design Requirements</th>
    <th>Complete</th>
  </tr>
  <tr>
    <td width="100px">1</td>
    <td>All pages must have a navigation menu, either across the top of the page or down the left or right column.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>2</td>
    <td>The home page must display all posts. Only posts should be displayed, not comments.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Next to each post there should be a number indicating how many comments are there for this post.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>4</td>
    <td>From the home page, clicking on a post will bring up the comments page. The comments page for a post should contain that post and all comments for that post.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>5</td>
    <td>The home page must display a form for the user to create a new post. Each post should contain a title, a message, a date, an icon, and a user&rsquo;s name (the user is not required to login, they can simply enter their name in the post form). All posts can have the same icon. When creating a new post, the user must enter the title, message, and user&rsquo;s name. Date can either be entered or generated by the system. After a new post is successfully created, it should redirect back to the home page.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Users can edit posts. After a post is edited, the comments page for that post is displayed.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>7</td>
    <td>Users can delete posts. When user deletes a post, the comments for that post should also be deleted.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>8</td>
    <td>Users can add comments to a post. A comment must have a message and a user, but no title.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Users can delete comments.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>10</td>
    <td>There is a page that lists all unique users that have made a post (i.e. a user is only displayed once no matter how many posts this user has made). Clicking on the user should display all posts made by that user.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>11</td>
    <td>There is a most recent page, which shows only the posts that have been made in the last 7 days.</td>
    <td>✓</td>
  </tr>
  <tr>
    <th>Req. ID No.</th>
    <th>Technical Requirements</th>
    <th>Complete</th>
  </tr>
  <tr>
    <td>1</td>
    <td>This assignment must be implemented using Laravel. Database access should be implemented via raw SQL and executed through Laravel&rsquo;s DB class. You are not to use Laravel's ORM (ORM will be used for assignment 2).</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>2</td>
    <td>An SQL file should be used to create tables and insert initial data. There should be enough initial data to thoroughly test the retrieval, update, and deletion functionalities you have implemented.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>3</td>
    <td>All input must be validated; validation errors message must be displayed within the view.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Proper security measures must be implemented, e.g. perform HTML and SQL sanitisation etc. You should be able to explain the security measures you have implemented.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Template inheritance must be properly used.</td>
    <td>✓</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Good coding practice is expected. This includes:<br>
    - Naming: using consistent, readable, and descriptive names for files, functions, variables etc.<br>
    - Readability: correct indenting/spacing of code.<br>
    - Commenting: there should at least be a short description for each function.</td>
    <td>✓</td>
  </tr>
</table>
</div>
@endsection