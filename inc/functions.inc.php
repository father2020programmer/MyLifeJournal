<?php

// check for empty feilds for singup
function empSignup($first, $last, $email, $pwd, $pwdch, $loc, $dpt, $age){
    $result;
    if( empty($first) || empty($last) || empty($email) || empty($pwd) || empty($pwdch) || empty($loc) || empty($dpt) || empty($age)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

//  check email format
function valEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// check that both passwords match in sign up 
function matchPwd($pwd, $pwdch){
    $result;
    if($pwd !== $pwdch){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// check for user already exist 
function emailExist($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=stmtfailed");
            exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function grabPosts($conn, $user_id){
    $sql = "SELECT * FROM posts WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../home.php?error=stmtfailed");
            exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// function to create user 
function createUser($conn, $first, $last, $email, $pwd, $loc, $dpt, $admin, $date, $age){
    $sql = "INSERT INTO users (first_name, last_name, email, password, location, dept, is_admin, register_date, age) 
    VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../signup.php?error=stmtfailed");
            exit();
    }

    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssiss", $first, $last, $email, $hashPwd, $loc, $dpt, $admin, $date, $age);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    $userExist = emailExist($conn, $email);

    if($userExist == false){
        header("Location: ../signup.php?error=stmtfailed");
            exit();
    } else if ($userExist == true) {
        session_start();
        $_SESSION['userid'] = $userExist['id'];
        $_SESSION['useremail'] = $userExist['email'];
        $_SESSION['userInfo'] = $userExist;
        header("Location: ../home.php");
    }
}

// empty field check for login
function empLogin($email, $pwd){
    $result;
    if( empty($email) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

// login user
function loginUser($conn, $email, $pwd){
    $userExist = emailExist($conn, $email);

    if($userExist == false){
        header("Location: ../index.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $userExist['password'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd == false){
        header("Location: ../index.php?error=wronglogin");
        exit();
    } else if ($checkPwd == true){
        session_start();
        $_SESSION['userid'] = $userExist['id'];
        $_SESSION['useremail'] = $userExist['email'];
        $_SESSION['userInfo'] = $userExist;
        header("Location: ../home.php");
    }
}

function createPost($conn, $user_id, $title, $body, $date){
    $sql = "INSERT INTO posts (user_id, title, body, post_date)
    VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);    
    if(!mysqli_stmt_prepare($stmt, $sql)){
         header("Location: ../post.php?error=stmtfailed");
         exit();
    }

    mysqli_stmt_bind_param($stmt, "isss", $user_id, $title, $body, $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../home.php");
}

function postempty($title, $body){
    $result;
    if( empty($title) || empty($body)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}