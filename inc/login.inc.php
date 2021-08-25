<?php 
    // check if post is submit
    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        
        // obtain needed files
        require_once "server.inc.php";
        require_once "functions.inc.php";

        // error check for login
        if(empLogin($email, $pwd) !== false){
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        // login function
        loginUser($conn, $email, $pwd);

    } else {

        header("Location: ../index.php?error=wronglogin");
        exit();
    }