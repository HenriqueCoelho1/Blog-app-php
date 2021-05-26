<?php
if(isset($_GET['u_id'])){
    $edit_user_by_id = $_GET['u_id'];
}

$query_single_user = "SELECT * FROM user WHERE id = $edit_user_by_id ";
$select_user_by_id =  mysqli_query($connection, $query_single_user);

while($row = mysqli_fetch_assoc($select_user_by_id)){
    $user_username = $row['username'];
    $user_email = $row['email'];
    $user_password = $row['password'];
    $user_firstname = $row['firstname'];
    $user_lastname = $row['lastname'];
    $user_is_superuser = $row['is_superuser'];
    $user_image = $row['image'];
    $user_rand_salt = $row['rand_salt'];
    $user_dh_insert = $row['dh_insert'];
}

if(isset($_POST['update_user'])){
    $user_username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_is_superuser = $_POST['is_superuser'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $user_rand_salt = $_POST['rand_salt'];


    move_uploaded_file($user_image_temp, "../upload/$user_image");

    if(empty($user_image)){
        $query_image = "SELECT * FROM user WHERE id = $edit_user_by_id";
        $select_image = mysqli_query($connection, $query_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $user_image = $row['image'];
        }
    }

    $query_update = "UPDATE user SET ";
    $query_update .= "username = '$user_username', ";
    $query_update .= "email = '$user_email', ";
    $query_update .= "password = '$user_password', ";
    $query_update .= "firstname = '$$user_firstname', ";
    $query_update .= "lastname = '$$user_lastname', ";
    $query_update .= "is_superuser = '$user_is_superuser', ";
    $query_update .= "image = '$user_image', ";
    $query_update .= "dh_insert = now(), ";
    $query_update .= "WHERE id  = '$edit_user_by_id' ";
    

    $update_query = mysqli_query($connection, $query_update);

    confirm_query($update_query);
}




?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" value="<?php echo $user_username; ?>" class="form-control" name="username" />
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="password" />
    </div>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="firstname" />
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="lastname" />
    </div>
    <div class="form-group">
        <select name="is_superuser" id="">
            <option value="">Select</option>
            <option value="0">Is User</option>
            <option value="1">Is Admin</option>
        </select>
    </div>
    <div class="form-group">
        <img src="../upload/<?php echo $user_image; ?>" width="100" alt=""/>
        <br />
        <input type="file" name="image" />
    </div>
    <div class="form-group">
        <label for="rand_salt">Rand Salt</label>
        <input type="text" value="<?php echo $user_rand_salt; ?>" class="form-control" name="rand_salt" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Edit User" />
    </div>
</form>