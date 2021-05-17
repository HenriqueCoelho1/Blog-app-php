<?php include "includes/components/header.php";?>

    <div id="wrapper"> 
        <?php include "includes/components/nav.php";?>
        

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
                                    <tr>
                                    <td>BBBBBBBBBBB</td>
                                    <td>AAAAAAAAAAA</td>
                                    <td>AAAAAAAAAAA</td>
                                    <td>AAAAAAAAAAA</td>
                                    </tr>
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

        <?php include "includes/components/footer.php";?>  
