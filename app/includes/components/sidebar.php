<div class="col-md-4">
                

                
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    
                </div>

                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $query = "SELECT * FROM category LIMIT 3";
                            $select_category_sidebar =  mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_category_sidebar)){
                                $category_title = $row['title'];
                                echo "<li><a href='#'>{$category_title}</a></li>";

                            }
                            ?>
                        </div>
                        
                        

                    </div>
                    
                </div>

                
                <?php include "widget.php";?>

            </div>