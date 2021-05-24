<?php
//debug
function confirm_query($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED! " . mysqli_error($connection));
    }

}

function insert_category(){
    global $connection;
    if(isset($_POST['submit'])){
        $category_title = $_POST['category_title'];

        if($category_title == "" || empty($category_title)){
            echo "This field should not be empty";
        }else{
            $query = "INSERT INTO category(title) ";
            $query .= "VALUE('{$category_title}') ";
            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query){
                die('QUERY FAILED ' . mysqli_error($connection));
            }

        }

    }   
}

function find_all_categories(){
    global $connection;

    $query = "SELECT * FROM category";
    $select_categories =  mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categories)){
        $category_id = $row['id'];
        $category_title = $row['title'];
        echo "<tr>";
        echo "<td>{$category_id}</td>";
        echo "<td>{$category_title}</td>";
        echo "<td><a href='categories.php?delete={$category_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$category_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function delete_category(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_category_id = $_GET['delete'];
        $query_delete = "DELETE FROM category WHERE id = {$delete_category_id}" ;
        $delete_query_category = mysqli_query($connection, $query_delete);
        header("Location: categories.php");
    }
}


function find_all_posts(){
    global $connection;

    $query_post = "SELECT * FROM post";
    $select_post =  mysqli_query($connection, $query_post);
    while($row = mysqli_fetch_assoc($select_post)){
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_author = $row['author'];
        $post_dh_insert = $row['dh_insert'];
        $post_image = $row['image'];
        $post_content = substr($row['content'], 0, 50);
        $post_tags = $row['tags'];
        $post_comment_count = $row['comment_count'];
        $post_status = $row['status'];
        $post_category = $row['category'];
        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_dh_insert}</td>";
        echo "<td><img class='img-responsive' width='100' src='../images/{$post_image}' alt='images'></img></td>";
        echo "<td>{$post_content}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_status}</td>";
        
        $query_edit = "SELECT * FROM category WHERE id = {$post_category} ";
        $select_categories_edit =  mysqli_query($connection, $query_edit);
        while($row = mysqli_fetch_assoc($select_categories_edit)){
            $category_id = $row['id'];
            $category_title = $row['title'];
            echo "<td>{$category_title}</td>";
        }
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "</tr>";
    }
    
}

function delete_post(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_post_id = $_GET['delete'];

        $query_delete_post = "DELETE FROM post where id = {$delete_post_id} ";
        $delete_query_post = mysqli_query($connection, $query_delete_post);
        header("Location: posts.php");
    }
    
}

function display_post(){
    global $connection;

    if(isset($_GET['p_id'])){
        echo $_GET['p_id'];
    }
    $query_post = "SELECT * FROM post";
    $select_post =  mysqli_query($connection, $query_post);
    while($row = mysqli_fetch_assoc($select_post)){
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_author = $row['author'];
        $post_dh_insert = $row['dh_insert'];
        $post_image = $row['image'];
        $post_content = $row['content'];
        $post_tags = $row['tags'];
        $post_comment_count = $row['comment_count'];
        $post_status = $row['status'];
        $post_category = $row['category'];
    }


}


?>