<?php include "includes/db.inc.php"; ?>
<?php include "includes/header.php";?>

<?php include "includes/nav.php";?>

<?php
if(isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    $query = "SELECT * FROM user WHERE username = '{$username}'; ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $user_email = $row["email"];
        $user_password = $row["password"];
        $user_firstname = $row["firstname"];
        $user_lastname = $row["lastname"];
        $user_is_superuser = $row["is_superuser"];
        $user_image = $row["image"];
        $user_dh_insert = $row["dh_insert"];

    }
}
?>

<div class="columns">
    <div class="container profile">
        <div class="modal" id="edit-preferences-modal">
        <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Edit Preferences</p>
                    <button class="delete"></button>
                </header>
                    <section class="modal-card-body">
                        <label class="label">First Name:</label>
                        <p class="control">
                            <input class="input" placeholder="Text input" type="text" value="<?php echo $user_firstname;?>">
                        </p>
                        <label class="label">Last Name:</label>
                        <p class="control">
                            <input class="input" placeholder="Text input" type="text" value="<?php echo $user_lastname;?>">
                        </p>
                        <label class="label">Username:</label>
                        <p class="control has-icon has-icon-right">
                            <input class="input" placeholder="Text input" disabled type="text" value="<?php echo $username;?>">
                        </p>
                        <label class="label">Email:</label>
                        <p class="control has-icon has-icon-right">
                            <input class="input" placeholder="Email input" disabled type="text" value="<?php echo $user_email;?>">
                            <!-- <i class="fa fa-warning"></i>
                            <span class="help is-danger">This email is invalid</span> -->
                            
                        </p>
                        <br />

                        <div class="control">
                            <div class="control-label is-pulled-left">
                                <label class="label">Profile Image</label>
                            </div>
                            <div class='column is-2'>
                                <span class='header-icon user-profile-image'>
                                    <img alt='' src="../upload/<?php echo $user_image; ?>">
                                </span>
                            </div>
                        </div>
                    <label class="label">Description</label>
                    <p class="control">
                        <textarea class="textarea" placeholder="Describe Yourself!"></textarea>
                    </p>
                    <div class="content">
                        <h1>Optional Information</h1>
                    </div>
                    <label class='label'>Phone Number</label>
                    <p class='control has-icon has-icon-right'>
                        <input class='input' placeholder='Text input' type='text' value='+1 *** *** 0535'>
                    </p>
                    <label class='label'>Work</label>
                    <p class='control has-icon has-icon-right'>
                        <input class='input' placeholder='Text input' type='text' value='Greater Washington Publishing'>
                    </p>
                    <label class='label'>School</label>
                    <p class='control has-icon has-icon-right'>
                        <input class='input' placeholder='Text input' type='text' value='George Mason University'>
                    </p>
                    </section>
                <footer class='modal-card-foot'>
                <a class='button is-primary modal-save'>Save changes</a>
                <a class='button modal-cancel'>Cancel</a>
                </footer>
            </div>
        </div>
        <div class='section profile-heading'>
        <div class='columns is-mobile is-multiline'>
            <div class='column is-2'>
                <span class='header-icon user-profile-image'>
                    <img alt='' src="../upload/<?php echo $user_image; ?>">
                </span>
            </div>
            <div class='column is-4-tablet is-10-mobile name'>
            <p>
                <span class='title is-bold'><?php echo $user_firstname . " " . $user_lastname ?></span>
                <br>
                <a class='button is-primary is-outlined' href='#' id='edit-preferences' style='margin: 5px 0'>
                Edit Preferences
                </a>
                <br>
            </p>
            <p class='tagline'>
                The users profile bio would go here, of course. It could be two lines or more or whatever. We should probably limit the amount of characters to ~500 at most though.
            </p>
            </div>
            <div class='column is-2-tablet is-4-mobile has-text-centered'>
            <p class='stat-val'>30</p>
            <p class='stat-key'>searches</p>
            </div>
            <div class='column is-2-tablet is-4-mobile has-text-centered'>
            <p class='stat-val'>10</p>
            <p class='stat-key'>likes</p>
            </div>
            <div class='column is-2-tablet is-4-mobile has-text-centered'>
            <p class='stat-val'>3</p>
            <p class='stat-key'>lists</p>
            </div>
        </div>
        </div>
        <div class='profile-options is-fullwidth'>
        <div class='tabs is-fullwidth is-medium'>
            <ul>
            <li class='link'>
                <a>
                <span class='icon'>
                    <i class='fa fa-list'></i>
                </span>
                <span>My Lists</span>
                </a>
            </li>
            <li class='link is-active'>
                <a>
                <span class='icon'>
                    <i class='fa fa-thumbs-up'></i>
                </span>
                <span>My Likes</span>
                </a>
            </li>
            <li class='link'>
                <a>
                <span class='icon'>
                    <i class='fa fa-search'></i>
                </span>
                <span>My Searches</span>
                </a>
            </li>
            <li class='link'>
                <a>
                <span class='icon'>
                    <i class='fa fa-balance-scale'></i>
                </span>
                <span>Compare</span>
                </a>
            </li>
            </ul>
        </div>
        </div>
        <div class='box' style='border-radius: 0px;'>
        <!-- Main container -->
        <div class='columns'>
            <div class='column is-2-tablet user-property-count has-text-centered'>
            <p class='subtitle is-5'>
                <strong></strong>
                123
                <br>
                properties
            </p>
            </div>
            <div class='column is-8'>
            <p class='control has-addons'>
                <input class='input' placeholder='Search your liked properties' style='width: 100% !important' type='text'>
                <button class='button'>
                Search
                </button>
            </p>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>