<?php include "include/db.php"; ?>
<div class="col-md-4">

             
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    
                    <form action="search.php" method="post">
                    
                    
                    <div class="input-group">
                        <input type="text" name="searchName" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    
                    
                    </form>
                    
                    
                    
                    <!-- /.input-group -->
                    
                    
                    <div class="well">
                    <h4>Login</h4>
                    
                    <form action="include/login.php" method="post">
                    
                    
                    <div class="form-group">
                        <input type="text" name="username" placeholder="Enter Username" class="form-control">
                        
                    </div>
                    <div class="input-group">
                        <input type="password" name="userPassword" placeholder="Enter Password" class="form-control">
                        <span class="input-group-btn"><button class="btn btn-primary" name="login"> Login</button></span>
                        
                    </div>
                    
                    
                    </form>
                    
                </div>

                <!-- Blog Categories Well -->
                <?php
                 $query="SELECT * FROM category";
                $select_category=mysqli_query($connection,$query);
                 ?>
                
                
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                             <?php
                                while($row=mysqli_fetch_assoc($select_category)){
                                    
                                   $cat_id=$row['cat_id'];
                                    $cat_name=$row['cat_name'];
                        
                        
                        echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_name}</a></li>";
                        
                         }
                                
                                ?>
                               
                               
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        
                        
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php";?>

            </div>
