<?php include "includes/components/admin_header.php";?>

    <div id="wrapper"> 
        <?php include "includes/components/admin_nav.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php insert_category(); ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category_title">Add a Category</label>
                                    <input class="form-control" type="text" name="category_title" id="" />
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add a Category" />
                                </div>
                            </form>

                            <?php 
                            if(isset($_GET['edit'])){
                                $category_id = $_GET['edit'];
                                include "includes/components/update_categories.php";
                            } 
                            ?>

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
                                <?php find_all_categories();?>

                                <?php delete_category();?>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        

        <?php include "includes/components/admin_footer.php";?>  
