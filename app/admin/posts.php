<?php include "includes/admin_header.php";?>
<?php include "includes/admin_nav.php";?>

    <div class="column is-11">
        <h1 class="title is-1">
            Welcome to Admin
        </h1>
        <h2 class="subtitle is-2">
            Author
        </h2>
        <?php
        if(isset($_GET["source"])){
            $source = $_GET["source"];
        }else {
            $source = "";
        }
        
        switch($source){
            case "add_post":
            include "includes/add_posts.php";
            break;

            case "edit_post":
            include "includes/edit_post.php";
            break;

            default:
            include "includes/view_all_posts.php";
            break;
        }
        ?>
    </div>
    
</div> <!-- Final div for columns -->

        

        
                        
