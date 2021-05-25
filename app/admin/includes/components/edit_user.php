<?php
if(isset($_GET['u_id'])){
    $edit_user_by_id = $_GET['u_id'];
}

$query_single_user = "SELECT * FROM user where id = $edit_user_by_id ";
$select_user_by_id =  mysqli_query($connection, $query_single_user);

while($row = mysqli_fetch_assoc($select_post_by_id)){
    $post_id = $row['id'];
    $post_title = $row['title'];
    $post_author = $row['author'];
    $post_dh_insert = $row['dh_insert'];
    $post_image = $row['image'];
    $post_content = $row['content'];
    $post_tags = $row['tags'];
    $post_status = $row['status'];
    $post_category = $row['category'];
}

if(isset($_POST['update_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];


    move_uploaded_file($post_image_temp, "../upload/$post_image");

    if(empty($post_image)){
        $query_image = "SELECT * FROM post WHERE id = $edit_post_by_id";
        $select_image = mysqli_query($connection, $query_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $post_image = $row['image'];
        }
    }

    $query_update = "UPDATE post SET ";
    $query_update .= "title = '$post_title', ";
    $query_update .= "category = '$post_category', ";
    $query_update .= "dh_insert = now(), ";
    $query_update .= "author = '$post_author', ";
    $query_update .= "status = '$post_status', ";
    $query_update .= "tags = '$post_tags', ";
    $query_update .= "content = '$post_content', ";
    $query_update .= "image = '$post_image' ";
    $query_update .= "WHERE id  = '$edit_post_by_id' ";

    $update_query = mysqli_query($connection, $query_update);

    confirm_query($update_query);
}




?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title" />
    </div>
    <div class="form-group">
        <select name="category" id="">
        <?php
        $query_display_category = "SELECT * FROM category";
        $select_categories = mysqli_query($connection, $query_display_category);

        confirm_query($select_categories);

        echo "<option value=''>Select</option>";
        while($row = mysqli_fetch_assoc($select_categories)){
            $id = $row['id'];
            $title = $row['title'];

            echo "<option value='{$id}'>{$title}</option>";
        }

        ?>
        </select>
            
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author" />
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="status" />
    </div>
    <div class="form-group">
        <img src="../upload/<?php echo $post_image; ?>" width="100" alt=""/>
        <br />
        <input type="file" name="image" />
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="tags" />
    </div>
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea class="form-control" value="" name="content" id="" cols="30" rows="10"><?php echo $post_content;?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post" />
    </div>
</form>