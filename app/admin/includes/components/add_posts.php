<?php
if(isset($_POST['create_post'])){
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['category_id'];
    $post_status = $_POST['status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_dh_insert = date('dd-mmm-yyyy');
    $post_comment_count = 4;


    move_uploaded_file($post_image_temp, "../upload/$post_image");


    $query = "INSERT INTO post(category, title, author, dh_insert, image, content, tags, comment_count, status) VALUES ({$post_category}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";
    // $query = "INSERT INTO post(category, title, author, dh_insert, image, ";
    // $query .= "content, tags, comment_count, status) ";
    // $query .= "VALUES ({$post_category}, '{$post_title}', '{$post_author}', '{$post_dh_insert}', '{$post_image}', ";
    // $query .= "'{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}')";
    
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
        <label for="post_category">Post Category</label>
        <input type="text" class="form-control" name="category_id" />
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