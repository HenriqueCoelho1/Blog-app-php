<?php
if(isset($_GET["u_id"])){
    $edit_user_by_id = $_GET["u_id"];
}

$query_single_user = "SELECT * FROM user WHERE id = $edit_user_by_id ";
$select_user_by_id =  mysqli_query($connection, $query_single_user);

while($row = mysqli_fetch_assoc($select_user_by_id)){
    $user_username = $row["username"];
    $user_email = $row["email"];
    $user_password = $row["password"];
    $user_firstname = $row["firstname"];
    $user_lastname = $row["lastname"];
    $user_is_superuser = $row["is_superuser"];
    $user_image = $row["image"];
    $user_rand_salt = $row["rand_salt"];
    $user_dh_insert = $row["dh_insert"];
}

if(isset($_POST["update_user"])){
    $user_username = $_POST["username"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];
    $user_firstname = $_POST["firstname"];
    $user_lastname = $_POST["lastname"];
    $user_is_superuser = $_POST["is_superuser"];

    $user_image = $_FILES["image"]["name"];
    $user_image_temp = $_FILES["image"]["tmp_name"];

    $user_rand_salt = $_POST["rand_salt"];


    move_uploaded_file($user_image_temp, "../upload/$user_image");

    if(empty($user_image)){
        $query_image = "SELECT * FROM user WHERE id = $edit_user_by_id";
        $select_image = mysqli_query($connection, $query_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $user_image = $row["image"];
        }
    }

    $query_update = "UPDATE user SET ";
    $query_update .= "username = '$user_username', ";
    $query_update .= "email = '$user_email', ";
    $query_update .= "password = '$user_password', ";
    $query_update .= "firstname = '$user_firstname', ";
    $query_update .= "lastname = '$user_lastname', ";
    $query_update .= "is_superuser = '$user_is_superuser', ";
    $query_update .= "image = '$user_image', ";
    $query_update .= "dh_insert = now() ";
    $query_update .= "WHERE id  = $edit_user_by_id ";
    

    $update_query = mysqli_query($connection, $query_update);

    confirm_query($update_query);
    header("Location: users.php");
}




?>

<section class="hero has-background-black-ter is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="box">
                    <div class="is-5-tablet is-4-desktop is-3-widescreen">
                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <h3 class="title is-3 has-text-centered">Edit User</h3>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="username">Username:</label>
                                            <div class="control">
                                            <input 
                                            class="input is-info" 
                                            type="text" 
                                            name="username"
                                            placeholder="Username" 
                                            value="<?php echo $user_username; ?>" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                            <label class="label" for="title">Email:</label>
                                            <div class="control">
                                                <input class="input is-info" 
                                                type="email" 
                                                placeholder="Your Email" 
                                                name="email" 
                                                value="<?php echo $user_email; ?>" />
                                            </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="password">Password:</label>
                                            <div class="control">
                                            <input 
                                            class="input is-info" 
                                            type="password" 
                                            name="password"
                                            placeholder="User Password" 
                                            value="<?php echo $user_password; ?>" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                        <label class="label" for="is_superuser">Is Admin?</label>
                                        <div class="control">
                                            <div class="select">
                                            <select name="is_superuser" id="">
                                                <option value="">Select</option>
                                                <option value="0">Is User</option>
                                                <option value="1">Is Admin</option>
                                            </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="firstname">First Name:</label>
                                            <div class="control">
                                            <input 
                                            class="input is-info" 
                                            type="text" 
                                            name="firstname"
                                            placeholder="User First Name" 
                                            value="<?php echo $user_firstname; ?>" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                            <label class="label" for="lastname">Last Name:</label>
                                            <div class="control">
                                                <input class="input is-info" 
                                                type="text"
                                                name="lastname"  
                                                placeholder="User Last Name" 
                                                value="<?php echo $user_lastname; ?>" />
                                            </div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <?php 
                                        if(!empty($user_image)){
                                            echo "<img src='../upload/<?php echo $user_image; ?>' width='100' alt=''/>";
                                        }
                                        else{
                                            echo "<img src='../upload/default-user.jpg' width='100' alt=''/>";
                                        }
                                        ?>
                                        <label class="label" for="image">Image:</label>
                                        <div class="control">
                                        <div class="file is-medium">
                                            <label class="file-label">
                                                <input class="file-input" type="file" name="image">
                                                <span class="file-cta">
                                                <span class="file-icon">
                                                    <i class="fa fa-upload"></i>
                                                </span>
                                                <span class="file-label">
                                                    Choose a file…
                                                </span>
                                                </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="field">    
                                        <label class="label" for="rand_salt">Rand Salt:</label>
                                        <div class="control">
                                            <input 
                                            class="input is-info" 
                                            type="text" 
                                            placeholder="rand_salt" 
                                            name="rand_salt" 
                                            value="<?php echo $user_rand_salt; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field p-1">
                                <div class="control">
                                    <button class="button is-info is-medium is-fullwidth" name="update_user" value="">Update User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
