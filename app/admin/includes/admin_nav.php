<div id="app">
    
<!-- Navigation -->
    <nav class="navbar is-dark" role="navigation" aria-label="admin navigation">
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

    <div class="columns p-3">


    <div class="column is-one-fifth">
        
        <div class="is-black">
        <aside class="menu">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li><a>Dashboard</a></li>
                <li><a>Customers</a></li>
            </ul>

            <p class="menu-label">Administration</p>

            <ul class="menu-list">
                <li><a>Team Settings</a></li>
                <li>
                    <a class="is-active">Manage Your Team</a>
                    <ul>
                    <li><a>Members</a></li>
                    <li><a>Plugins</a></li>
                    <li><a>Add a member</a></li>
                    </ul>
                </li>
                <li><a>Invitations</a></li>
                <li><a>Cloud Storage Environment Settings</a></li>
                <li><a>Authentication</a></li>
            </ul>

            <p class="menu-label">
            Transactions
            </p>
            <ul class="menu-list">
                <li><a>Payments</a></li>
                <li><a>Transfers</a></li>
                <li><a>Balance</a></li>
            </ul>
        </aside>
        </div>

    </div>

    

    
</div>