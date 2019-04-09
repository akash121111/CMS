<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>
 

    <!-- Navigation -->
    
<?php include "include/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['cat_id'])){
                    $cat_id=$_GET['cat_id'];
                    echo $cat_id;
                    
                   
                }
                    
                
                $query="SELECT * FROM post WHERE postCategoryId=$cat_id";
                $SelectAllPostData=mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($SelectAllPostData)){
                    
                    $postId=$row['postId'];
                    $postTitle=$row['postTitle'];
                    $postAuthor=$row['postAuthor'];
                    $postDate=$row['postDate'];
                    $postImage=$row['postImage'];
                    $postContent=substr($row['postContent'],0,100);
                   
                   ?>
                   
                   <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                
                
                
                <h2>
                    <a href="post.php?pId=<?php echo $postId ;?>"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate ?></p>
                <hr>
                <img  class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                   
                 <?php            
                    
                    
                }
           
                
                
                ?>

               
              
              
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php include "include/sidebar.php"; ?>
          
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "include/footer.php"; ?>