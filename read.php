<?php include "inc/header.php"; 
require_once "inc/server.inc.php";

if(isset($_GET['post'])){
    $postid = $_GET['post'];
    $sql = "SELECT * FROM posts WHERE post_id = $postid";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_object($result)){
        echo "<h1 class='title'>$row->title</h1>";
        echo "<p class='body'>$row->body</p>";
        echo "<p class='post_date'>date: $row->post_date</p>";
    }
} else if (isset($_GET['article'])){
    $postid = $_GET['article'];
    $sql = "SELECT
    posts.body,
    posts.title,
    posts.post_date, 
    users.first_name,
    users.last_name
    FROM posts
    RIGHT JOIN users 
    ON posts.user_id = users.id 
    WHERE posts.post_id = $postid;";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_object($result)){
        echo "<h1 class='title'>$row->title</h1>";
        echo "<p class='author'>by $row->first_name $row->last_name</p>";
        echo "<p class='body'>$row->body</p>";
        echo "<p class='post_date'>date: $row->post_date</p>";
    }
}





include "inc/footer.html"; ?> 