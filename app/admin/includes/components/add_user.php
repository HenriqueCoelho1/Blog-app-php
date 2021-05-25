<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['category'];
    $post_status = $_POST['status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_dh_insert = date('dd-mmm-yyyy');


    move_uploaded_file($post_image_temp, "../upload/$post_image");


    $query = "INSERT INTO post(category, title, author, dh_insert, image, content, tags, status) VALUES ({$post_category}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
    
    $create_post_query = mysqli_query($connection, $query);


    confirm_query($create_post_query);
    
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" />
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
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" />
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" class="form-control" name="status" />
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" />
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" />
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Post a content"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post" />
    </div>
</form>