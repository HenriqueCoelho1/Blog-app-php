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
            case "add_user":
            include "add_user.php";
            break;

            case "edit_user":
            include "edit_user.php";
            break;

            default:
            include "view_all_users.php";
            break;
        }
        ?>
        </div>
    
</div> <!-- Final div for columns -->
    
