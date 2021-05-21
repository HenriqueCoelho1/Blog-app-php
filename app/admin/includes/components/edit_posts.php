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
        <label for="title">Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title" />
    </div>
    <div class="form-group">
        <select name="" id="">
        <?php
        $query_display_category = "SELECT * FROM category";
        $select_categories = mysqli_query($connection, $query_display_category);

        confirm_query($select_categories);

        echo "<option value=''>Select</option>";
        while($row = mysqli_fetch_assoc($select_categories)){
            $id = $row['id'];
            $title = $row['title'];

            echo "<option value='{$title}'>{$title}</option>";
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
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post" />
    </div>
</form>