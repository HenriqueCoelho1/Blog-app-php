
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Posts Writing</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Blog</a>
            </div>
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php
                    $query = "SELECT * FROM category";
                    $select_all_category =  mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_category)){
                        $category_id = $row['id'];
                        $category_title = $row['title'];
                        echo "<li><a href='category.php?category={$category_id}'>{$category_title}</a></li>";

                    }
                ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php
                    if(isset($_SESSION["username"])){
                        echo "<li><a href='profile.php'>Profile</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                    }
                    else{
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href='signup.php'>Sign Up</a></li>";
                    }
                    ?>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            
        </div>
        
    </nav>