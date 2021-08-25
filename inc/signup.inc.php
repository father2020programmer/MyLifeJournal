<?php    
    //Test path of post
    if(isset($_POST['submit'])){
        // collect info
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdch = $_POST['pwdcheck'];
        $loc = $_POST['loc'];
        $dpt = $_POST['dpt'];
        $admin = $_POST['admin'];
        $age = $_POST['age'];
        $date = date("Y-m-d H:i:s");

        // get needed files 
        require_once "server.inc.php";
        require_once "functions.inc.php";

        //check if input is empty function
        if(empSignup($first, $last, $email, $pwd, $pwdch, $loc, $dpt, $age) !== false){
            header("Location: ../signup.php?error=emptyinput");
            exit();
        }

        //check valid email 
        if(valEmail($email) !== false){
            header("Location: ../signup.php?error=valEmail");
            exit();
        }

        //check if passwords match
        if(matchPwd($pwd, $pwdch) !== false){
            header("Location: ../signup.php?error=pswnotMatch");
            exit();
        }

        // check if email has already been added
        if(emailExist($conn, $email) !== false){
            header("Location: ../signup.php?error=emailused");
            exit();
        }

        //Send info to creat user function
        createUser($conn, $first, $last, $email, $pwd, $loc, $dpt, $admin, $date, $age);

    };


