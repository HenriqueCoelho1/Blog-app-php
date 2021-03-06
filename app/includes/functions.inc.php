<?php
//debug
function confirm_query($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED! " . mysqli_error($connection));
    }

}

// function current_url(){
//     $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     $valid_url = str_replace("&", "&amp", $url);
//     return $valid_url;
// }
// function return_id($id){
    
//     return $id;
    
// }

function empty_input_signup($firstname, $lastname, $username, $email, $password, $password_repeat){
    $result;
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email)  || empty($password) || empty($password_repeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function role_int($is_superuser){
    $result;
    if(!is_int($is_superuser) && is_string($is_superuser)){
        $result = false;
        if($is_superuser === "1"){
            $is_superuser === 1;

        }else if($is_superuser === "0"){
            $is_superuser === 0;
        }
        else{
            $result = true;
        }
    }
    else{
        $result = true;
    }
    return $result;
    return $is_superuser;
}


function invalid_username($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalid_email($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function password_match($password, $password_repeat){
    $result;
    if($password !== $password_repeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function username_exist($connection, $username, $email){
    $query = "SELECT * FROM user WHERE username = ? OR email = ? ;";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)){
        $uri = $_SERVER["REQUEST_URI"];
        if($uri === "admin/posts.php?source=add_post"){
            header("Location: ../users.php?source=add_user&error=stmtfailed");
            exit();
        }
        else if($uri === "signup.php"){
            header("Location: ../signup.php?error=stmtfailed");
            exit();
        }
        
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);


    $result_data = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result_data)){
        return $row;

    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function create_user($connection, $username, $email, $password, $firstname, $lastname, $image){
    $query = "INSERT INTO user(username, email, password, firstname, lastname, image) ";
    $query .= "VALUES(?, ?, ?, ?, ?, ?) ";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)){
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $hash_password, $firstname, $lastname, $image);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?error=none");
    exit();
}

function create_user_admin($connection, $username, $email, $password, $firstname, $lastname, $is_superuser, $image){
    $query = "INSERT INTO user(username, email, password, firstname, lastname, is_superuser, image) ";
    $query .= "VALUES(?, ?, ?, ?, ?, ?, ?) ";
    $stmt = mysqli_stmt_init($connection);

    if(!mysqli_stmt_prepare($stmt, $query)){
        header("Location: ../users.php?source=add_user&error=stmtfailed");
        exit();
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssis", $username, $email, $hash_password, $firstname, $lastname, $is_superuser, $image);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../users.php?source=add_user&error=none");
    exit();
}

// function edit_user_admin($connection, $id, $username, $email, $password, $firstname, $lastname, $is_superuser, $image){

//     $hash_password = password_hash($password, PASSWORD_DEFAULT);

//     $id = return_id()

//     $query_update = "UPDATE user SET ";
//     $query_update .= "username = '$username', ";
//     $query_update .= "email = '$email', ";
//     $query_update .= "password = '$hash_password', ";
//     $query_update .= "firstname = '$firstname', ";
//     $query_update .= "lastname = '$lastname', ";
//     $query_update .= "is_superuser = '$is_superuser', ";
//     $query_update .= "image = '$image', ";
//     $query_update .= "dh_insert = now() ";
//     $query_update .= "WHERE id  = $id ";

//     $update_query = mysqli_query($connection, $query_update);

//     confirm_query($update_query);

//     header("Location: users.php");
//     exit();
// }



function empty_input_login($username, $password){
    $result;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function login_user($connection, $username, $password){
    $username_exists = username_exist($connection, $username, $username);

    if($username_exists === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }

    $password_hash = $username_exists["password"];
    $check_password = password_verify($password, $password_hash);

    if($check_password === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }else if($check_password === true){
        session_start();
        $_SESSION["id"] = $username_exists["id"];
        $_SESSION["username"] = $username_exists["username"];
        $_SESSION["is_superuser"] = $username_exists["is_superuser"];
        header("Location: ../index.php");
        exit();
    }

}



function insert_category(){
    global $connection;
    if(isset($_POST["submit"])){
        $category_title = $_POST["category_title"];

        if($category_title == "" || empty($category_title)){
            echo "This field should not be empty";
        }else{
            $query = "INSERT INTO category(title) ";
            $query .= "VALUE('{$category_title}') ";
            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query){
                die("QUERY FAILED " . mysqli_error($connection));
            }

        }

    }   
}

function find_all_categories(){
    global $connection;

    $query = "SELECT * FROM category";
    $select_categories =  mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categories)){
        $category_id = $row["id"];
        $category_title = $row["title"];
        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_title}</td>";
        echo "<td><a href='categories.php?delete={$category_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$category_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function delete_category(){
    global $connection;
    if(isset($_GET["delete"])){
        $delete_category_id = $_GET["delete"];
        $query_delete = "DELETE FROM category WHERE id = {$delete_category_id}" ;
        $delete_query_category = mysqli_query($connection, $query_delete);
        header("Location: categories.php");
    }
}


function find_all_posts(){
    global $connection;

    $query_post = "SELECT * FROM post";
    $select_post =  mysqli_query($connection, $query_post);
    while($row = mysqli_fetch_assoc($select_post)){
        $post_id = $row["id"];
        $post_title = $row["title"];
        $post_author = $row["author"];
        $post_dh_insert = $row["dh_insert"];
        $post_image = $row["image"];
        $post_content = substr($row["content"], 0, 50);
        $post_tags = $row["tags"];
        $post_comment_count = $row["comment_count"];
        $post_status = $row["status"];
        $post_category = $row["category"];
        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_dh_insert}</td>";
        echo "<td><img class='img-responsive' width='100' src='../images/{$post_image}' alt='images'></img></td>";
        echo "<td>{$post_content}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_status}</td>";
        
        $query_edit = "SELECT * FROM category WHERE id = {$post_category} ";
        $select_categories_edit =  mysqli_query($connection, $query_edit);
        while($row = mysqli_fetch_assoc($select_categories_edit)){
            $category_id = $row["id"];
            $category_title = $row["title"];
            echo "<td>{$category_title}</td>";
        }
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "</tr>";
    }
    
}

function delete_post(){
    global $connection;
    if(isset($_GET["delete"])){
        $delete_post_id = $_GET["delete"];

        $query_delete_post = "DELETE FROM post WHERE id = {$delete_post_id} ";
        $delete_query_post = mysqli_query($connection, $query_delete_post);
        header("Location: posts.php");
    }
    
}

function display_post(){
    global $connection;
    
    $id_post_edit = (!empty($_GET["p_id"])) ? str_replace("'", "", $_GET["p_id"]) : null;

    if($id_post_edit){
        $rest = " = $id_post_edit";
    }
    else{
        $rest = " IS NULL";
    }
    
    
    $query_post = "SELECT * FROM post WHERE id " .$rest;
    $select_post =  mysqli_query($connection, $query_post);
    if(!$select_post){
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($select_post)){
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_author = $row['author'];
        $post_dh_insert = $row['dh_insert'];
        $post_image = $row['image'];
        $post_content = $row['content'];
        $post_tags = $row['tags'];
        $post_comment_count = $row['comment_count'];
        $post_status = $row['status'];
        $post_category = $row['category'];
    }
}


function find_all_comments(){
    global $connection;

    $query_comment = "SELECT * FROM comment";
    $select_comment =  mysqli_query($connection, $query_comment);
    while($row = mysqli_fetch_assoc($select_comment)){
        $comment_id = $row['id'];
        $comment_user = $row['user'];
        $comment_email = $row['email'];
        $comment_content = $row['content'];
        $comment_dh_insert = $row['dh_insert'];
        $comment_post = $row['post'];
        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_user}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_dh_insert}</td>";

        $query_post_comment = "SELECT * FROM post WHERE id = $comment_post ";
        $select_post_id_query = mysqli_query($connection, $query_post_comment);
        while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['id'];
            $post_title = $row['title'];
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        }
        
        
        // $query_edit = "SELECT * FROM category WHERE id = {$comment_category} ";
        // $select_categories_edit =  mysqli_query($connection, $query_edit);
        // while($row = mysqli_fetch_assoc($select_categories_edit)){
        //     $category_id = $row['id'];
        //     $category_title = $row['title'];
        //     echo "<td>{$category_title}</td>";
        // }

        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$comment_post}'>Edit</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function delete_comment(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_comment_id = $_GET['delete'];

        $query_delete_comment = "DELETE FROM comment where id = {$delete_comment_id} ";
        $select_delete_query_comment = mysqli_query($connection, $query_delete_comment);
        header("Location: comments.php");
    }
}

function unapprove_comment(){
    global $connection;
    if(isset($_GET['unapprove'])){
        $unapprove_comment_id = $_GET['unapprove'];

        $query_unapprove_comment = "UPDATE comment SET status = 'Unapproved' WHERE id = $unapprove_comment_id ";
        $select_unapprove_query_comment = mysqli_query($connection, $query_unapprove_comment);
        header("Location: comments.php");
    }
}

function approve_comment(){
    global $connection;
    if(isset($_GET['approve'])){
        $unapprove_comment_id = $_GET['approve'];

        $query_approve_comment = "UPDATE comment SET status = 'Approved' WHERE id = $unapprove_comment_id ";
        $select_approve_query_comment = mysqli_query($connection, $query_approve_comment);
        header("Location: comments.php");
    }
    
}

function find_all_users(){
    global $connection;

    $query_user = "SELECT * FROM user";
    $select_user =  mysqli_query($connection, $query_user);
    while($row = mysqli_fetch_assoc($select_user)){
        $user_id = $row['id'];
        $user_username = $row['username'];
        $user_email = $row['email'];
        $user_password = $row['password'];
        $user_firstname = $row['firstname'];
        $user_lastname = $row['lastname'];
        $user_is_superuser = $row['is_superuser'];
        $user_image = $row['image'];
        $user_dh_insert = $row['dh_insert'];
        if($user_is_superuser == 0){
            $is_admin = "No";
        }else{
            $is_admin = "Yes";
        }
        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$user_username}</td>";
        echo "<td>{$user_email}</td>";
        if(!strlen($user_password > 15)){
            $user_sub_password = substr("{$user_password}", 0, 15);
            echo "<td>{$user_sub_password}</td>";

        }else{
            echo "<td>{$user_password}</td>";
        }
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$is_admin}</td>";
        if(!empty($user_image)){
            echo "<td><img class='img-responsive' width='100' src='../images/{$user_image}' alt='images'></img></td>";
        }
        else{
            echo "<td><img class='img-responsive' width='50' height='50' src='../upload/default-user.jpg' alt='images'></img></td>";
        }
        echo "<td>{$user_dh_insert}</td>";
        echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
        echo "</tr>";
    }
    
}

function display_user(){
    global $connection;

    $id_user_edit = (!empty($_GET["u_id"])) ? str_replace("'", "", $_GET["u_id"]) : null;

    if($id_user_edit){
        $rest = " = $id_user_edit";
    }
    else{
        $rest = " IS NULL";
    }
    
    $query_user = "SELECT * FROM user WHERE id " . $rest;
    $select_user =  mysqli_query($connection, $query_user);
    while($row = mysqli_fetch_assoc($select_user)){
        $user_id = $row["id"];
        $user_username = $row["username"];
        $user_email = $row["email"];
        $user_password = $row["password"];
        $user_firstname = $row["firstname"];
        $user_lastname = $row["lastname"];
        $user_is_superuser = $row["is_superuser"];
        $user_image = $row["image"];
        $user_dh_insert = $row["dh_insert"];
    }
}

function delete_user(){
    global $connection;
    if(isset($_GET["delete"])){
        $delete_user_id = $_GET["delete"];

        $query_delete_user = "DELETE FROM user where id = {$delete_user_id} ";
        $delete_query_user = mysqli_query($connection, $query_delete_user);
        header("Location: users.php");
    }
    
}
