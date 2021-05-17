<?php include "includes/components/admin_header.php";?>

    <div id="wrapper"> 
        <?php include "includes/components/admin_nav.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php
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
                            ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category_title">Add a Category</label>
                                    <input class="form-control" type="text" name="category_title" id="" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add a Category" />
                                </div>
                            </form>

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
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Edit a Category" />
                                </div>
                            </form>

                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
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
                                ?>

                                <?php
                                    if(isset($_GET['delete'])){
                                        $delete_category_id = $_GET['delete'];
                                        $query_delete = "DELETE FROM category WHERE id = {$delete_category_id}" ;
                                        $delete_query = mysqli_query($connection, $query_delete);
                                        header("Location: categories.php");
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/components/admin_footer.php";?>  
