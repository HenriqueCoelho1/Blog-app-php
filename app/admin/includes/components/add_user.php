<?php
if(isset($_POST['create_user'])){

    $user_username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_is_superuser = $_POST['is_superuser'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $user_dh_insert = date('dd-mm-yyyy');
    $rand_salt = '123456abc';


    move_uploaded_file($user_image_temp, "../upload/$user_image");


    $query_user = "INSERT INTO user (username, email, password, firstname, lastname, is_superuser, image, dh_insert ,rand_salt) VALUES ('{$user_username}', '{$user_email}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', {$user_is_superuser}, '{$user_image}', now(), '{$rand_salt}')";
    
    $create_user_query = mysqli_query($connection, $query_user);


    confirm_query($create_user_query);
    
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" />
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" />
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="firstname" placeholder="Your First Name" />
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="lastname" placeholder="Your Last Name" />
    </div>
    <div class="form-group">
        <!-- <label for="is_superuser">Super User</label>
        <input type="number" class="form-control" name="is_superuser" placeholder="Super User" /> -->
        <select name="is_superuser" id="">
            <option value="">Select</option>
            <option value="0">Is User</option>
            <option value="1">Is Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Publish User" />
    </div>
</form>