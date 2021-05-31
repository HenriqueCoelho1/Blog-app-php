<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php";?>

<h2>Sign In</h2>
<form action="includes/login.inc.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username Or Email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Your password" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" />
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








<?php include "includes/footer.php"; ?>