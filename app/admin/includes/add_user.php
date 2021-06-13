

<section class="hero has-background-black-ter is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="box">
                    <div class="is-5-tablet is-4-desktop is-3-widescreen">
                        <form action="add_user.inc.php" method="post">
                            <h3 class="title is-3 has-text-centered">Add User</h3>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="firstname">First Name:</label>
                                            <div class="control">
                                                <input class="input is-info" type="text" placeholder="Your First Name" name="firstname" value="" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                            <label class="label" for="lastname">Last Name:</label>
                                            <div class="control">
                                                <input class="input is-info" type="text" placeholder="Your Last Name" name="lastname" value="" />
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="username">Username: </label>
                                            <div class="control">
                                                <input class="input is-info" type="text" placeholder="Your Username" name="username" value="" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                            <label class="label" for="email">Email: </label>
                                            <div class="control">
                                                <input class="input is-info" type="email" placeholder="Your Email" name="email" value="" />
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">    
                                            <label class="label" for="password">Password: </label>
                                            <div class="control">
                                                <input class="input is-info" type="password" placeholder="Your Password" name="password" value="" />
                                            </div>
                                    </div>
                                    <div class="field">    
                                            <label class="label" for="password_repeat">Repeat Password:</label>
                                            <div class="control">
                                                <input class="input is-info" type="password" placeholder="Your Password" name="password_repeat" value="" />
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <label class="label" for="is_superuser">User role:</label>    
                                            <div class="select is_small">
                                                <select name="is_superuser" id="">
                                                    <option value="">Select</option>
                                                    <option value="0">Is User</option>
                                                    <option value="1">Is Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="field">    
                                            <label class="label" for="image">Image:</label>
                                            <div class="control">
                                                <div class="file is-small">
                                                    <label class="file-label">
                                                        <input class="file-input" type="file" name="image">
                                                        <span class="file-cta">
                                                        <span class="file-icon">
                                                            <i class="fa fa-upload"></i>
                                                        </span>
                                                        <span class="file-label">
                                                            Choose a file…
                                                        </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="field">
                                    <div class="control">
                                        <button class="button is-info is-medium is-fullwidth" name="submit" value="">Create User</button>
                                    </div>
                            </div>
                            <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyinput"){
                                    echo "<p>Fill in all fields!</p>";
                                }
                                else if($_GET["error"] == "invaliduid"){
                                    echo "<p>Choose a proper username!</p>";
                                }
                                else if($_GET["error"] == "invalidemail"){
                                    echo "<p>Choose a proper email!</p>";
                                }
                                else if($_GET["error"] == "passwordsdontmatch"){
                                    echo "<p>Password doesn't match!</p>";
                                }
                                else if($_GET["error"] == "stmtfailed"){
                                    echo "<p>Something went wrong, try again!</p>";
                                }
                                else if($_GET["error"] == "usernametaken"){
                                    echo "<p>Username already taken!</p>";
                                }
                                else if($_GET["error"] == "none"){
                                    echo "<p>You have signed up!</p>";
                                }
                            }
                            ?> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>