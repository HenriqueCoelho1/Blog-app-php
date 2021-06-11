
<!-- Navigation -->
    <nav class="navbar is-black" role="navigation" aria-label="admin navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-brand">

                        <a href="index.php" class="navbar-item">
                            <h2>CMS Administration</h2>
                        </a>
                    
                        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar_admin">
                            <span></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>

                    <div id="navbar_admin" class="navbar-menu">
                        <div class="navbar-start">
                            <a href="../index.php" class="navbar-item">Blog Home</a>
                        </div>

                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="field is-grouped">
                                
                                    <?php
                                    if(isset($_SESSION["username"])){
                                        echo "<p class='control'><a href='profile.php' class='button is-dark'><span class='icon'><i class='fa fa-user'></i></i></span><span>Profile</span></a></p>";
                                        echo "<p class='control'><a href='includes/logout.inc.php' class='button'><span class='icon'><i class='fa fa-sign-out'></i></i></span><span>Log Out</span></a></p>";
                                    }
                                    ?>
                                
                                </div>
                            </div>
                        </div>

                    </div>
                
                <!-- /.navbar-collapse -->
    </nav>
    

    <div class="columns">
        <div class="column is-2 hero has-background-black is-fullheight">
            
                
                    <div class="column">
                        <aside class="menu">
                            <p class="menu-label">General</p>
                            <ul class="menu-list">
                                <li><a class="has-text-white" href="index.php"><span class="icon"><i class="fa fa-tachometer"></i></span> Dashboard</a></li>
                                <li>
                                    <a class="has-text-white" href="posts.php" data-toggle="collapse" data-target="#posts_dropdown"><span class="icon"><i class="fa fa-table"></i></span> Posts</a>
                                    <ul id="posts_dropdown" class="collapse">
                                        <li><a class="has-text-white" href="posts.php?source=add_post"><span class="icon"><i class="fa fa-plus-circle"></i></span> Add Post</a></li>
                                        <li><a class="has-text-white" href="posts.php?source=view_all_post"><span class="icon"><i class="fa fa-edit"></i></span> View All Posts</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <p class="menu-label">Administration</p>

                            <ul class="menu-list">
                                <li><a class="has-text-white">Team Settings</a></li>
                                <li>
                                    <a class="has-text-white">Manage Your Team</a>
                                    <ul>
                                        <li><a class="has-text-white">Members</a></li>
                                        <li><a class="has-text-white">Plugins</a></li>
                                        <li><a class="has-text-white">Add a member</a></li>
                                    </ul>
                                </li>
                                <li><a class="has-text-white">Invitations</a></li>
                                <li><a class="has-text-white">Cloud Storage Environment Settings</a></li>
                                <li><a class="has-text-white">Authentication</a></li>
                            </ul>

                            <p class="menu-label">
                            Transactions
                            </p>
                            <ul class="menu-list">
                                <li><a class="has-text-white">Payments</a></li>
                                <li><a class="has-text-white">Transfers</a></li>
                                <li><a class="has-text-white">Balance</a></li>
                            </ul>

                        </aside>
                    </div>
        </div>
        
    
    