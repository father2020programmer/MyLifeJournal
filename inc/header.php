<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script:wght@700&family=Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>My Life Journal</title>
</head>
<body>
    <header class="container">
        <div>
            <img class="logo" src="/images/logo.png" alt="company logo">
        </div>   
        <div>
            <ul class="nav">
                <?php
                    if(isset($_SESSION['userid'])){
                        echo "<li><a href='home.php'>Home</a></li>";
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='post.php'>Post</a></li>";
                        echo "<li><a href='inc/logout.inc.php'>Log Out</a></li>";
                    } else {
                        echo "<li><a href='index.php'>Home</a></li>";
                        echo "<li><a href='about.php'>About</a></li>";
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                    }
                ?>                
            </ul>
        </div>
    </header>
