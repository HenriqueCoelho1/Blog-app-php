<?php include "includes/admin_header.php";?>
<?php include "includes/admin_nav.php";?>
<?php
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $query = "SELECT * FROM user WHERE username = '{$username}'; ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $user_firstname = $row["firstname"];
        $user_lastname = $row["lastname"];

    }
}

?>

    <div class="column is-11">
        <h1 class="title is-1">
            Welcome to Admin
        </h1>
        <h2 class="subtitle is-2">
            <?php echo $user_firstname;?>
        </h2>
    </div>
    <div class="container p-5">
    </div>
</div> <!-- Final div for columns -->
                        
                        

            


                <!-- Page Heading -->
                <!-- <div class="row">
                    <div class="is-11">
                        
                        
                    </div>
                </div> -->
                <!-- /.row -->

            <!-- </div> -->
            <!-- /.container-fluid -->

        <!-- </div> -->
        <!-- /#columns admin-nav -->

        <?php include "includes/admin_footer.php";?>  
