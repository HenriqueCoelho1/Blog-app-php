<?php
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
?>