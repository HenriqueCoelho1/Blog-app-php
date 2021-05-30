<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>

    
    

    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
            <?php
            $query = "SELECT * FROM post WHERE status = 'Published'";
            $select_all_post = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_post)){
                $post_id = $row['id'];
                $post_title = $row['title'];
                $post_author = $row['author'];
                $post_dh_insert = $row['dh_insert'];
                $post_image = $row['image'];
                $post_content = substr($row['content'], 0, 100);
                $post_status = $row['status'];

                if($post_status !== "Published"){
                    echo "<h1 class='text-center'>Does not have a post yet...</h1>";
                }
                else{

                    
                    
                    
            ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_dh_insert;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="" />
                </a>
                
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php
                }
            }
            ?>

                

                
                
                

                
                

            </div>
            <?php include "includes/sidebar.php";?>
            
            

        </div>

        

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php";?>
