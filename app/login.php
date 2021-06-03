<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php";?>

<section class="hero has-background-white-ter is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="is-5-tablet is-4-desktop is-3-widescreen">
                    <form action="includes/login.inc.php" method="post">
                        <h3 class="title is-3 is-centered">Login</h3>
                        <div class="field p-1">    
                                <label class="label" for="username">Name: </label>
                                <div class="control">
                                    <input class="input is-primary" type="text" placeholder="Your Name" name="username" value="" />
                                </div>
                        </div>
                        <div class="field p-1">    
                                <label class="label" for="password">Password: </label>
                                <div class="control">
                                    <input class="input is-primary" type="password" placeholder="Your Password" name="password" value="" />
                                </div>
                        </div>

                        <div class="field p-1">
                                <div class="control">
                                    <button class="button is-primary" name="submit" value="">Login</button>
                                </div>
                        </div>

                        <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p>Fill in all fields!</p>";
                            }
                            else if($_GET["error"] == "wronglogin"){
                                echo "<p>Incorrect login information!</p>";
                            }
                        }
                        ?>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>








<?php include "includes/footer.php"; ?>