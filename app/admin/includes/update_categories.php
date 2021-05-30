<form action="" method="post">
    <div class="form-group">
        <label for="category_title">Edit a Category</label>

        <?php
        if(isset($_GET['edit'])){
            $category_id = $_GET['edit'];
            $query_edit = "SELECT * FROM category WHERE id = $category_id ";
            $select_categories_edit =  mysqli_query($connection, $query_edit);
            while($row = mysqli_fetch_assoc($select_categories_edit)){
                $category_id = $row['id'];
                $category_title = $row['title'];
        ?>

        
        <input value="<?php if(isset($category_title)){echo $category_title;} ?>"
        class="form-control" 
        type="text" 
        name="category_title" />
        <?php
            }
        }
        ?>
        
        <?php
        if(isset($_POST['update'])){
            $update_category_title = $_POST['category_title'];
            $query_update = "UPDATE category SET title = '$update_category_title' WHERE id = {$category_id} ";
            $update_query = mysqli_query($connection, $query_update);
            if(!$update_query){
                die("QUERY FAILED " . mysqli_error($connection));

            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Edit a Category" />
    </div>
</form>