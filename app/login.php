<?php include "../db.inc.php";?>

<?php 
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM user WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);
    if(!$select_user_query){
        die("QUERY FAILED! " . mysqli_error($connection));
    }


    while($row = mysqli_fetch_array($select_user_query)){
        $db_user_id = $row['id'];
        $db_user_username = $row['username'];
        $db_user_password = $row['password'];
        $db_user_firstname = $row['firstname'];
        $db_user_lastname = $row['lastname'];
        $db_user_is_superuser = $row['is_superuser'];

        // if($username !== $db_user_username && $password !== $db_user_password){
        //     header("Location: index.php");
        // }
        // else if($username == $db_user_username && $password == $db_user_password){
        //     header("Location: /admin");
        // }
        // else{
        //     header("Location: index.php");

        // }

        if($username === $db_user_username && $password === $db_user_password){
            header("Location: /admin");
        }
        else{
            header("Location: ../index.php");

        }

    }
    

    
}


?>