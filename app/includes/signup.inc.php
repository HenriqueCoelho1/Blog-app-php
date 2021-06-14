<?php

if(isset($_POST['submit'])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];
    
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_temp = file_get_contents($image);

    require_once "db.inc.php";
    require_once "functions.inc.php";


    if(empty_input_signup($firstname, $lastname, $username, $email, $password, $password_repeat) !== false){
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalid_username($username) !== false){
        header("Location: ../signup.php?error=invaliduid");
        exit();
    }
    if(invalid_email($email) !== false){
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if(password_match($password, $password_repeat) !== false){
        header("Location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(username_exist($connection ,$username, $email) !== false){
        header("Location: ../signup.php?error=usernameexist");
        exit();
    }
    create_user($connection,  $username,  $email, $password, $firstname, $lastname);
    create_user_image($connection, $image_temp, $image);
}
else{
    header("Location: ../signup.php");
}