<?php include "db.php";
?>


       

       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                
            <?php    
                $query="SELECT * FROM category";
                $select_category=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_category)){
                        
                        $cat_name=$row['cat_name'];
                        
                        
                        echo "<li><a href='#'>{$cat_name}</a></li>";
                        
                        
                    }
                
                    
                    
                    ?>
                
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li>
                        <a href="registration.php">Register</a>
                    </li>
                    
<<<<<<< HEAD
                    <li>
                        <a href="Contact.php">Contact us</a>
                    </li>
=======
>>>>>>> 4390161d9d2d49dba254c865920cba6acbb0f88b
                    <?php
                    
                    if(isset($_SESSION['userRole'])){
                   
                        if(isset($_GET['pId'])){
                            $postId=$_GET['pId'];
                            echo "<li>
                       <a href='admin/posts.php?source=editPost&pId={$postId}'>Edit Post</a>
                    </li>";
                            
                        }
                        
                    }
                    
                    
                    
                    ?>
                    
                     
<!--
                    
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
