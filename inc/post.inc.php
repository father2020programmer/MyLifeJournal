<?php

session_start();

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['userInfo']['id'];
    $date = date("Y-m-d H:i:s");

    require_once "server.inc.php";
    require_once "functions.inc.php";

    if(postempty($title, $body) !== false){
        header('Location: ../post.php?error=postempty');
        exit();
    }

    createPost($conn, $user_id, $title, $body, $date);

};

