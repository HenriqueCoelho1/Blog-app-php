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
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php find_all_posts();?>
                                    
                                
                            </tbody>
                        </table>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        

        <?php include "includes/components/admin_footer.php";?>  
