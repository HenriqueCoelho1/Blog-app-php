<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php";?>

<h2>Sign Up</h2>
<form action="includes/signup.inc.php" method="post">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" class="form-control" placeholder="Your First Name" />
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" class="form-control" placeholder="Your Last Name" />
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Your Username" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Your Email" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Your password" />
    </div>
    <div class="form-group">
        <label for="password_repeat">Repeat Your Password</label>
        <input type="password" name="password_repeat" class="form-control" placeholder="Repeat Your Password" />
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" />
    </div>
    
</form>


<?php include "includes/footer.php"; ?>