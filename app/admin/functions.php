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
?>