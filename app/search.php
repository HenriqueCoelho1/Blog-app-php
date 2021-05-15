<?php           

?>
<?php include "includes/db.php"; ?>
<?php include "includes/components/header.php";?>

<?php include "includes/components/nav.php";?>

    
    

    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
            <?php
                if(isset($_POST['submit'])){
                    $search = $_POST['search'];
                    $query = "SELECT * FROM post WHERE tags LIKE '%$search%' ";
                    $search_query = mysqli_query($connection, $query);
                
                    if(!$search_query){
                        die("QUERY FAILED " . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);
                    if($count == 0){
                        echo "<h1>No result! </h1>";

                    }else{
                        while($row = mysqli_fetch_assoc($search_query)){
                            $post_title = $row['title'];
                            $post_author = $row['author'];
                            $post_dh_insert = $row['dh_insert'];
                            $post_image = $row['image'];
                            $post_content = $row['content'];
                            $post_title = $row['title'];
                    
                    
            ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_dh_insert;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php
                        }
                        
                    }
                } 
            ?>
                

                

                
                
                

                
                

            </div>
            <?php include "includes/components/sidebar.php";?>
            
            

        </div>

        

        <hr>

        <!-- Footer -->
        <?php include "includes/components/footer.php";?>
