<?php 
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    require_once "db.inc.php";
    require_once "functions.inc.php";


    if(empty_input_login($username, $password) !== false){
        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    login_user($connection, $username, $password);
    
}
else{
    header("Location: ../login.php");
    exit();
}

