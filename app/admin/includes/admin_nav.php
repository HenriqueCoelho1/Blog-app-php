<!-- Navigation -->
<nav class="navbar is-dark" role="navigation" aria-label="admin navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-brand">
        
                    <a href="index.php" class="navbar-item">
                        <h2>CMS Administration</h2>
                    </a>
                
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
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