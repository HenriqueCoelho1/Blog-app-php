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
                                $query = "SELECT * FROM category LIMIT 3";
                                $select_categories =  mysqli_query($connection, $query);

                                
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add a Category</label>
                                    <input class="form-control" type="text" name="cat_title" id="" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add a Category" />
                                </div>
                            
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while($row = mysqli_fetch_assoc($select_categories)){
                                    $category_id = $row['id'];
                                    $category_title = $row['title'];
                                    echo "<tr>";
                                    echo "<td>{$category_id}</td>";
                                    echo "<td>{$category_title}</td>";
                                    echo "</tr>";
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
