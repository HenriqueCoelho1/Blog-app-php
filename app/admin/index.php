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
<?php $query_all_posts = "SELECT * FROM post";
$select_all_posts = mysqli_query($connection, $query_all_posts);
$post_counts = mysqli_num_rows($select_all_posts);

$query_by_last = "SELECT id, dh_insert, title FROM post ORDER BY dh_insert DESC LIMIT 1";
$select_by_last = mysqli_query($connection, $query_by_last);
while($row = mysqli_fetch_array($select_by_last)){
    $post_id = $row['id'];
    $post_dh_insert = $row['dh_insert'];
    $post_title = $row['title'];
}

$query_all_users = "SELECT * FROM user";
$select_all_users = mysqli_query($connection, $query_all_users);
$user_counts = mysqli_num_rows($select_all_users);

$query_all_admin_users = "SELECT is_superuser FROM user WHERE is_superuser = 1";
$select_all_admin_users = mysqli_query($connection, $query_all_admin_users);
$user_admin_counts = mysqli_num_rows($select_all_admin_users);

$query_all_normal_users = "SELECT is_superuser FROM user WHERE is_superuser = 0";
$select_all_normal_users = mysqli_query($connection, $query_all_normal_users);
$user_normal_counts = mysqli_num_rows($select_all_normal_users);

$query_all_comments = "SELECT * from comment";
$select_all_comments = mysqli_query($connection, $query_all_comments);
$comment_counts = mysqli_num_rows($select_all_comments);

$query_all_categories = "SELECT * from category";
$select_all_categories = mysqli_query($connection, $query_all_categories);
$categories_counts = mysqli_num_rows($select_all_categories);
?>


<main class="column">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <div class="title">Dashboard</div>
                </div>
            </div>
            
        </div>
        <div class="columns is-multiline">
            <div class="column">
                <div class="box">
                    <div class="heading">Total Posts</div>
                    <div class="title"><?php echo $post_counts;?></div>
                    <div class="level">
                        <div class="level-item">
                            <div class="">
                                <div class="heading">Last Post</div>
                                <div class="title is-5"><a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a></div>
                            </div>
                        </div>
                        <div class="level-item">
                            <div class="">
                            <div class="heading">Overall $</div>
                            <div class="title is-5">750,000</div>
                            </div>
                        </div>
                        <div class="level-item">
                            <div class="">
                            <div class="heading">Sales %</div>
                            <div class="title is-5">25%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
            <div class="box">
                <div class="heading">Total Of All Users</div>
                <div class="title"><?php echo $user_counts; ?></div>
                <div class="level">
                <div class="level-item">
                    <div class="">
                    <div class="heading">Admins</div>
                    <div class="title is-5"><?php echo $user_admin_counts ?></div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Users</div>
                    <div class="title is-5"><?php echo $user_normal_counts?></div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Exp %</div>
                    <div class="title is-5">45%</div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="column">
            <div class="box">
                <div class="heading">Total Comments</div>
                <div class="title"><?php echo $comment_counts; ?></div>
                <div class="level">
                <div class="level-item">
                    <div class="">
                    <div class="heading">Positive</div>
                    <div class="title is-5">1560</div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Negative</div>
                    <div class="title is-5">368</div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Pos/Neg %</div>
                    <div class="title is-5">77% / 23%</div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="column">
            <div class="box">
                <div class="heading">Total Categories</div>
                <div class="title"><?php echo $categories_counts ?></div>
                <div class="level">
                <div class="level-item">
                    <div class="">
                    <div class="heading">Orders $</div>
                    <div class="title is-5">425,000</div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Returns $</div>
                    <div class="title is-5">106,250</div>
                    </div>
                </div>
                <div class="level-item">
                    <div class="">
                    <div class="heading">Success %</div>
                    <div class="title is-5">+ 28,5%</div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- <div class="columns is-multiline">
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading">
                    Expenses: Daily - $700
                    </p>
                    <div class="panel-block">
                        <figure class="image is-16x9">
                            <img src="https://placehold.it/1280x720">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading">
                    Refunds: Daily - $200
                    </p>
                    <div class="panel-block">
                        <figure class="image is-16x9">
                            <img src="https://placehold.it/1280x720">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading">
                    Something
                    </p>
                    <div class="panel-block">
                        <figure class="image is-16x9">
                            <img src="https://placehold.it/1280x720">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="panel">
                    <p class="panel-heading">
                    Something Else
                    </p>
                    <div class="panel-block">
                        <figure class="image is-16x9">
                            <img src="https://placehold.it/1280x720">
                        </figure>
                    </div>
                </div>
            </div>
        </div> -->

        
    </main>
</div> <!-- Final div for columns -->


        <?php include "includes/admin_footer.php";?>  
