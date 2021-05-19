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
                        <?php
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = '';
                        }
                        switch($source){
                            case '33':
                            echo "Hello World!";
                            break;

                            case '34':
                            echo "Hello World!";
                            break;

                            default:
                            include "includes/components/view_all_posts.php";
                            break;
                        }
                        ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        

        <?php include "includes/components/admin_footer.php";?>  
