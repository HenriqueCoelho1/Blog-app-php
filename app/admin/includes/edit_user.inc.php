<?php
if(isset($_POST["update_user"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $is_superuser = $_POST["is_superuser"];
    $password_repeat = $_POST["password_repeat"];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];


    move_uploaded_file($image_temp, "../../upload/$image");

    require_once "../../includes/db.inc.php";
    require_once "../../includes/functions.inc.php";

    
    if(role_int($is_superuser) !== false){
        header("Location: ../users.php?source=edit_user&error=emptyinputrole");
        exit();
    }
    if(empty_input_signup($firstname, $lastname, $username, $email, $password, $password_repeat) !== false){
        header("Location: ../users.php?source=edit_user&error=emptyinput");
        exit();
    }
    if(invalid_username($username) !== false){
        header("Location: ../users.php?source=edit_user=&error=invaliduid");
        exit();
    }
    if(invalid_email($email) !== false){
        header("Location: ../users.php?source=edit_user&error=invalidemail");
        exit();
    }
    if(password_match($password, $password_repeat) !== false){
        header("Location: ../users.php?source=edit_user&error=passwordsdontmatch");
        exit();
    }
    // if(username_exist($connection ,$username, $email) !== false){
    //     header("Location: ../users.php?source=edit_user&error=usernameexist");
    //     exit();
    // }
    if(empty($image)){
        $query_image = "SELECT * FROM user WHERE id = $_id";
        $select_image = mysqli_query($connection, $query_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $image = $row["image"];
        }
    }
    if(isset($_GET["u_id"])){
        $id = $_GET["u_id"];
    }
    $id === 1;
    edit_user_admin($connection, $id ,$username, $email, $password, $firstname, $lastname, $is_superuser, $image);

    


    // $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // $query_update = "UPDATE user SET ";
    // $query_update .= "username = '$username', ";
    // $query_update .= "email = '$email', ";
    // $query_update .= "password = '$hash_password', ";
    // $query_update .= "firstname = '$firstname', ";
    // $query_update .= "lastname = '$lastname', ";
    // $query_update .= "is_superuser = '$is_superuser', ";
    // $query_update .= "image = '$image', ";
    // $query_update .= "dh_insert = now() ";
    // $query_update .= "WHERE id  = $edit_user_by_id ";
    

    // $update_query = mysqli_query($connection, $query_update);

    // confirm_query($update_query);
    // header("Location: users.php");
}
