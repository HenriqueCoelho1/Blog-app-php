<?php
if(isset($_GET["p_id"])){
    $edit_post_by_id = $_GET["p_id"];
}

$query_single_post = "SELECT * FROM post WHERE id = $edit_post_by_id ";
$select_post_by_id =  mysqli_query($connection, $query_single_post);

while($row = mysqli_fetch_assoc($select_post_by_id)){
    $post_id = $row["id"];
    $post_title = $row["title"];
    $post_author = $row["author"];
    $post_dh_insert = $row["dh_insert"];
    $post_image = $row["image"];
    $post_content = $row["content"];
    $post_tags = $row["tags"];
    $post_status = $row["status"];
    $post_category = $row["category"];
}

if(isset($_POST["update_post"])){
    $post_title = $_POST["title"];
    $post_author = $_POST["author"];
    $post_category = $_POST["category"];
    $post_status = $_POST["status"];

    $post_image = $_FILES["image"]["name"];
    $post_image_temp = $_FILES["image"]["tmp_name"];

    $post_tags = $_POST["tags"];
    $post_content = $_POST["content"];


    move_uploaded_file($post_image_temp, "../upload/$post_image");

    if(empty($post_image)){
        $query_image = "SELECT * FROM post WHERE id = $edit_post_by_id";
        $select_image = mysqli_query($connection, $query_image);

        while($row = mysqli_fetch_assoc($select_image)){
            $post_image = $row["image"];
        }
    }

    $query_update = "UPDATE post SET ";
    $query_update .= "title = '$post_title', ";
    $query_update .= "category = $post_category, ";
    $query_update .= "dh_insert = now(), ";
    $query_update .= "author = '$post_author', ";
    $query_update .= "status = '$post_status', ";
    $query_update .= "tags = '$post_tags', ";
    $query_update .= "content = '$post_content', ";
    $query_update .= "image = '$post_image' ";
    $query_update .= "WHERE id  = $edit_post_by_id ";

    $update_query = mysqli_query($connection, $query_update);

    confirm_query($update_query);
    header("Location: posts.php");
}




?>

<section class="hero has-background-black-ter is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="box">
                    <div class="is-5-tablet is-4-desktop is-3-widescreen">
                    
                        <form action="" method="post" enctype="multipart/form-data">
                            <h3 class="title is-3 has-text-centered">Edit Post</h3>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="title">Title:</label>
                                            <div class="control">
                                                <input class="input is-info" 
                                                type="text" 
                                                placeholder="Your First Name" 
                                                name="title" value="<?php echo $post_title; ?>" />
                                            </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="category">Category:</label>    
                                        <div class="control has-icons-left">
                                            <div class="select is-medium">
                                                <select name="category" id="">
                                                    <?php
                                                    $query_display_category = "SELECT * FROM category";
                                                    $select_categories = mysqli_query($connection, $query_display_category);

                                                    confirm_query($select_categories);

                                                    echo "<option value=''>Select Category</option>";
                                                    while($row = mysqli_fetch_assoc($select_categories)){
                                                        $id = $row["id"];
                                                        $title = $row["title"];

                                                        echo "<option value='{$id}'>{$title}</option>";
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="icon is-small is-left">
                                                <i class="fa fa-filter"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                        <label class="label" for="author">Author: </label>
                                        <div class="control">
                                            <input class="input is-info" type="text" placeholder="Author" name="author" value="<?php echo $post_author; ?>" />
                                        </div>
                                    </div>
                                    <div class="field">    
                                        <label class="label" for="status">Status:</label>
                                        <div class="control has-icons-left">
                                            <div class="select is-medium">
                                                <select name="status" id="">
                                                    <?php 
                                                    if($post_status === "Published"){
                                                        echo "<option value='Unpublished'>Unpublished</option>";
                                                        echo "<option value='Published'>Published</option>";
                                                    }else if($post_status === "Unpublished"){
                                                        echo "<option value='Unpublished'>Unpublished</option>";
                                                        echo "<option value='Published'>Published</option>";
                                                    }
                                                    else{
                                                        echo "<option value='$post_status'>$post_status</option>";
                                                        echo "<option value='Unpublished'>Unpublished</option>";
                                                        echo "<option value='Published'>Published</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="icon is-small is-left">
                                                <i class="fa fa-filter"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                        <img src="../upload/<?php echo $post_image; ?>" width="100" alt=""/>
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
                                        <label class="label" for="tags">Tags:</label>
                                        <div class="control">
                                            <input class="input is-info" type="text" placeholder="Tags" name="tags" value="<?php echo $post_tags; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                        <label class="label" for="content">Content:</label>
                                        <div class="control">
                                            <textarea class="textarea is-info" placeholder="Content" name="content" rows="10" value="<?php echo $post_content;?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field p-1">
                                <div class="control">
                                    <button class="button is-info is-medium is-fullwidth" name="update_post" value="">Update Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>