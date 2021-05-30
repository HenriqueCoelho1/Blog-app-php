<div class="col-md-4">
                

                
                <div class="well">
                    <h2 class="text-center">Login</h2>
                    <form action="includes/components/login.php" method="post">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Enter Your Username" />
                            
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter Your Password" />
                            <span class="input-group-btn">
                                <button class="btn btn-primary" name="login" type="submit">Login</button>

                            </span>
                        </div>
                    </form>
                    
                </div>

                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class='list-unstyled'>
                            <?php
                            $query = "SELECT * FROM category";
                            $select_category_sidebar =  mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_category_sidebar)){
                                $category_title = $row['title'];
                                $category_id = $row['id'];
                                echo "<li><a href='category.php?category={$category_id}'>{$category_title}</a></li>";

                            }
                            ?>
                            </ul>
                        </div>
                        
                        

                    </div>
                    
                </div>

                
                <?php include "widget.php";?>

            </div>