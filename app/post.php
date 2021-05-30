<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>

    
    

    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
            <?php
                if(isset($_GET['p_id'])){
                    $selected_id_post = $_GET['p_id'];
                }
                $query = "SELECT * FROM post WHERE id = {$selected_id_post} ";
                $select_all_post = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_post)){
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
                ?>
                <!-- Blog Comments -->
                <?php
                if(isset($_POST['create_comment'])){
                    $selected_id_post = $_GET['p_id'];

                    $comment_author = $_POST['author'];
                    $comment_email = $_POST['email'];
                    $comment_content = $_POST['content'];

                    $query_comment = "INSERT INTO comment (post, author, email, content, status, dh_insert) ";
                    $query_comment .= "VALUES ($selected_id_post, '$comment_author', '$comment_email', '$comment_content', 'Unapproved', now() ) ";

                    $create_comment_query = mysqli_query($connection, $query_comment);
                    

                    $query_comment_count = "UPDATE post SET comment_count = comment_count + 1 ";
                    $query_comment_count .= "WHERE id = $selected_id_post ";
                    $update_comment_count = mysqli_query($connection, $query_comment_count);
                    
                        
                }
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" name="author"  />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"  />
                        </div>
                        <div class="form-group">
                            <label for="comment">Your comment</label>
                            <textarea type="text" 
                            class="form-control" 
                            name="content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                

                <?php
                $query_comments_post = "SELECT * FROM comment WHERE post = {$selected_id_post} ";
                $query_comments_post .= "AND status = 'Approved' ";
                $query_comments_post .= "ORDER BY id DESC";
                $select_comment_query = mysqli_query($connection, $query_comments_post);
                if(!$select_comment_query){
                    die("QUERY FAILED! " . mysqli_error($connection));
                }
                while($row = mysqli_fetch_array($select_comment_query)){
                    $comment_dh_insert = $row['dh_insert'];
                    $comment_content = $row['content'];
                    $comment_author = $row['author'];
                ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_dh_insert; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php include "includes/sidebar.php";?>
            
            

        </div>

        

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php";?>
