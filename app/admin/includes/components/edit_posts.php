<?php
if(isset($_GET['p_id'])){
    $edit_post_by_id = $_GET['p_id'];
}

$query_single_post = "SELECT * FROM post";
$select_post_by_id =  mysqli_query($connection, $query_single_post);

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




?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title" />
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <input type="text" value="<?php echo $post_category; ?>" class="form-control" name="category_id" />
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="author" />
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" value="<?php echo $post_status; ?>" class="form-control" name="status" />
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" />
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="tags" />
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <input type="text" value="<?php echo $post_content; ?>" class="form-control" name="content" />
        <!-- <textarea class="form-control" value="" name="content" id="" cols="30" rows="10">
        </textarea> -->
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post" />
    </div>
</form>