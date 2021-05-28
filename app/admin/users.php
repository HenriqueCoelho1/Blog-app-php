<?php include "includes/components/admin_header.php";?>

    <div id="wrapper"> 
        <?php include "includes/components/admin_nav.php";?>
        

        <div id="page-wrapper">

            <div class="container-fluid">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Edit
                            <small>Author</small>
                        </h1>
                        <?php
                        if(isset($_GET["source"])){
                            $source = $_GET["source"];
                        }else {
                            $source = "";
                        }
                        
                        switch($source){
                            case "add_user":
                            include "includes/components/add_user.php";
                            break;

                            case "edit_user":
                            include "includes/components/edit_user.php";
                            break;

                            default:
                            include "includes/components/view_all_users.php";
                            break;
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        

        <?php include "includes/components/admin_footer.php";?>  
