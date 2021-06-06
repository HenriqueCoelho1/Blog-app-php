
<nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        
        <a class="navbar-item" href="https://bulma.io">
            <h2>CMS Blog 2021</h2>
        </a>
    
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">Home</a>
            <a class="navbar-item" href="https://github.com/HenriqueCoelho1/" target="_blank">My Github <span class="icon is-left"><i class="fa fa-github"></i></span>
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">Categories</a>
                <div class="navbar-dropdown">
                    
                <?php
                    $query = "SELECT * FROM category LIMIT 4";
                    $select_all_category =  mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_all_category)){
                        $category_id = $row['id'];
                        $category_title = $row['title'];
                        echo "<a href='category.php?category={$category_id}' class='navbar-item'>{$category_title}</a>";
                    
                    }
                ?>
                <hr class="navbar-divider">
                </div>
                
            </div>

        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                
                    <?php
                    if(isset($_SESSION["username"])){
                        echo "<p class='control'><a href='profile.php' class='button is-dark'><span class='icon'><i class='fa fa-user'></i></i></span><span>Profile</span></a></p>";
                        echo "<p class='control'><a href='includes/logout.inc.php' class='button'><span class='icon'><i class='fa fa-sign-out'></i></i></span><span>Log Out</span></a></p>";
                    }
                    else{
                        echo "<p class='control'><a href='signup.php' class='button'><span class='icon'><i class='fa fa-user-plus'></i></i></span><span>Sign Up</span></a></p>";
                        echo "<p class='control'><a href='login.php' class='button is-dark'><span class='icon'><i class='fa fa-sign-in'></i></span><span>Login</span></a></p>";
                    }
                    ?>
                
                </div>
            </div>
        </div>

    </div>
</nav>