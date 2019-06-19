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
                if(isset($_GET['PA'])){
                    $PA=$_GET['PA'];
                    
                    
                
                
                $query="SELECT * FROM post WHERE postAuthor='{$PA}'  ";
                $SelectAllPostData=mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($SelectAllPostData)){
                    
                    $postId=$row['postId'];
                    $postTitle=$row['postTitle'];
                    $postAuthor=$row['postAuthor'];
                    $postDate=$row['postDate'];
                    $postImage=$row['postImage'];
                    $postContent=substr($row['postContent'],0,100);
                    $postStatus=$row['postStatus'];
                    if($postStatus=='published'){
                   
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
                     All post by <a href="authorPost.php?PA=<?php echo $postAuthor ;?>&pId=<?php echo $postId ;?>"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate ?></p>
                <hr>
                <a href="post.php?pId=<?php echo $postId ;?>">
                <img  class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
                </a>
                <hr>
                <p><?php echo $postContent ?></p>
                <a class="btn btn-primary" href="post.php?pId=<?php echo $postId ;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                   
                 <?php            
                    }
                    
                }
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