<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>

    

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
                        <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                            <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="field">
                            <p class="control">
                                <textarea class="textarea" placeholder="Add a comment..."></textarea>
                            </p>
                            </div>
                            <div class="field">
                            <p class="control">
                                <button class="button">Post comment</button>
                            </p>
                            </div>
                        </div>
                        </article>

                        <!-- <h4 class="title is-3">const</h4> -->
                        <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                            <img src="https://bulma.io/images/placeholders/128x128.png">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                            <p>
                                <strong>Barbara Middleton</strong>
                                <br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
                                <br>
                                <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                            </p>
                            </div>

                            <!-- <article class="media">
                                <figure class="media-left">
                                    <p class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                    <p>
                                        <strong>Sean Brown</strong>
                                        <br>
                                        Donec sollicitudin urna eget eros malesuada sagittis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam blandit nisl a nulla sagittis, a lobortis leo feugiat.
                                        <br>
                                        <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                    </p>
                                    </div>

                                    <article class="media">
                                    Vivamus quis semper metus, non tincidunt dolor. Vivamus in mi eu lorem cursus ullamcorper sit amet nec massa.
                                    </article>

                                    <article class="media">
                                    Morbi vitae diam et purus tincidunt porttitor vel vitae augue. Praesent malesuada metus sed pharetra euismod. Cras tellus odio, tincidunt iaculis diam non, porta aliquet tortor.
                                    </article>
                                </div>
                            </article> -->
                            <!-- <article class="media">
                                <figure class="media-left">
                                    <p class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                    <p>
                                        <strong>Kayli Eunice </strong>
                                        <br>
                                        Sed convallis scelerisque mauris, non pulvinar nunc mattis vel. Maecenas varius felis sit amet magna vestibulum euismod malesuada cursus libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus lacinia non nisl id feugiat.
                                        <br>
                                        <small><a>Like</a> · <a>Reply</a> · 2 hrs</small>
                                    </p>
                                    </div>
                                </div>
                            </article> -->

                        </div>
                        </article>

                    </div>
                </div>
            </div>
        </div>
        
</section>


    

        

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

                
                

                <?php
                $query_comments_post = "SELECT * FROM comment WHERE post = {$selected_id_post} ";
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

                



                <?php
                }
                ?>
