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

<section class="hero has-background-black-ter is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="box">
                    <div class="is-5-tablet is-4-desktop is-3-widescreen">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h3 class="title is-3 has-text-centered">Add Post</h3>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field p-1">    
                                            <label class="label" for="title">Title:</label>
                                            <div class="control">
                                                <input class="input is-info" type="text" placeholder="Your First Name" name="title" value="" />
                                            </div>
                                    </div>
                                    <div class="field p-1">    
                                        <div class="control has-icons-left">
                                            <div class="select">
                                                <select name="category" id="">
                                                    <option value="">Select Category</option>
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
                                            <div class="icon is-small is-left">
                                                <i class="fa fa-filter"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field p-1">    
                                        <label class="label" for="author">Author: </label>
                                        <div class="control">
                                            <input class="input is-info" type="text" placeholder="Author" name="author" value="" />
                                        </div>
                                    </div>
                                    <div class="field p-1">    
                                    <div class="control has-icons-left">
                                        <div class="select">
                                            <select name="status" id="">
                                                <option value="Unpublished">Unpublished</option>
                                                <option value="Published">Published</option>
                                                
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
                                    <div class="field p-1">    
                                        <label class="label" for="image">Image:</label>
                                        <div class="control">
                                        <div class="file">
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
                                    <div class="field p-1">    
                                            <label class="label" for="tags">Tags:</label>
                                            <div class="control">
                                                <input class="input is-info" type="text" placeholder="Tags" name="tags" value="" />
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field p-1">    
                                        <label class="label" for="content">Content:</label>
                                        <div class="control">
                                            <textarea class="textarea is-info" placeholder="Content" name="content" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field p-1">
                                <div class="control">
                                    <button class="button is-info is-medium is-fullwidth" name="create_post" value="">Publish Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>