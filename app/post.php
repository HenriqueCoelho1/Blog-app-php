<?php ob_start();?>
<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>


<?php
if(isset($_POST["create_comment"])){
    $selected_id_post = $_GET["p_id"];

    if(isset($_SESSION["id"])){
        $comment_user = $_SESSION["id"];
    }

    $comment_content = $_POST["content"];

    $query_comment = "INSERT INTO comment (post, user, content) ";
    $query_comment .= "VALUES ($selected_id_post, $comment_user, '$comment_content') ";

    $create_comment_query = mysqli_query($connection, $query_comment);

    if($create_comment_query){
        $query_comment_count = "UPDATE post SET comment_count = comment_count + 1 ";
        $query_comment_count .= "WHERE id = $selected_id_post ";
        $update_comment_count = mysqli_query($connection, $query_comment_count);
        header("Location: post.php?p_id=$selected_id_post");
        exit();
    }
    
    

    

    
        
}
?>

    

<section class="hero has-background-white-ter is-fullheight">
    <div class="hero-body">
    
        <div class="container p-2">

            <div class="row">
                <div class="columns is-centered">
                    <div class="is-6-desktop">
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
                        <h1 class="title is-1"><?php echo $post_title ?></h1>
                        <h5 class="subtitle is-5">
                            by <a href="index.php"><?php echo $post_author;?></a>
                        </h5>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_dh_insert;?></p>
                        <a href="post.php?p_id=<?php echo $post_id;?>">
                            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="" />
                        </a>
                        

                        <hr>
                        <p><?php echo $post_content?></p>
                    <?php
                        
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>   

        <hr>
        <div class="columns is-centered">
            <div class="column is-9">
                <div class="content">
                    <h4 class="title is-4 is-primary">Comment Section</h4>
                    <div class="box">
                        <br />

                        <form action="" method="post">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                    <img src="https://bulma.io/images/placeholders/128x128.png">
                                    </p>
                                </figure>
                                
                                    <div class="media-content">
                                        <div class="field">
                                            <p class="control">
                                                <textarea class="textarea" placeholder="Add a comment..." name="content"></textarea>
                                            </p>
                                        </div>
                                        <div class="field">
                                            <p class="control">
                                                <button class="button" name="create_comment">Post comment</button>
                                            </p>
                                        </div>
                                    </div>
                            </article>
                        </form>
                            
                        
                        <hr>

                        <!-- <h4 class="title is-3">const</h4> -->

                        <?php
                        $query_comments_post = "SELECT user, content, dh_insert, post FROM comment WHERE post = {$selected_id_post} ";
                        $query_comments_post .= "ORDER BY dh_insert DESC";
                        $select_comment_query = mysqli_query($connection, $query_comments_post);
                        if(!$select_comment_query){
                            die("QUERY FAILED! " . mysqli_error($connection));
                        }
                        while($row = mysqli_fetch_array($select_comment_query)){
                            $comment_user = $row["user"];
                            $comment_content = $row["content"];
                            $comment_dh_insert = $row["dh_insert"];
                        ?>
                    
                        <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                <img src="https://bulma.io/images/placeholders/128x128.png">
                                </p>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                <p>
                                    <strong><?php echo $comment_user; ?></strong>
                                    <br>
                                    <?php echo $comment_content; ?>
                                    <br>
                                    <small><a>Like</a> · <a>Reply</a> <?php echo $comment_dh_insert; ?></small>
                                </p>
                                </div>

                            </div>
                        </article>

                        



                        <?php
                        }
                        ?>
        
                    </div>
                </div>
            </div>
        </div>
        
</section>


    

        

                

                
                

                
