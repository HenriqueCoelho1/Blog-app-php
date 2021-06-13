<?php

if(isset($_POST['submit'])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $is_superuser = $_POST["is_superuser"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_temp, "../upload/$image");

    require_once "../../includes/db.inc.php";
    require_once "../../includes/functions.inc.php";

    
    if(role_int($is_superuser) !== false){
        header("Location: ../users.php?source=add_user&error=emptyinputrole");
        exit();
    }
    if(empty_input_signup($firstname, $lastname, $username, $email, $password, $password_repeat) !== false){
        header("Location: ../users.php?source=add_user&error=emptyinput");
        exit();
    }
    if(invalid_username($username) !== false){
        header("Location: ../users.php?source=add_user=&error=invaliduid");
        exit();
    }
    if(invalid_email($email) !== false){
        header("Location: ../users.php?source=add_user&error=invalidemail");
        exit();
    }
    if(password_match($password, $password_repeat) !== false){
        header("Location: ../users.php?source=add_user&error=passwordsdontmatch");
        exit();
    }
    if(username_exist($connection ,$username, $email) !== false){
        header("Location: ../users.php?source=add_user&error=usernameexist");
        exit();
    }
    create_user_admin($connection,  $username,  $email, $password, $firstname, $lastname, $is_superuser, $image);
}
else{
    header("Location: ../users.php?add_post");
}