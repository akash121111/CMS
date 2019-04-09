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
                if(isset($_GET['pId'])){
                $pId=$_GET['pId'];
                    
                    
                   
                }
               
               
                
                $query="SELECT * FROM post WHERE postId= $pId";
                $SelectAllPostData=mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($SelectAllPostData)){
                    
                    
                    $postTitle=$row['postTitle'];
                    $postAuthor=$row['postAuthor'];
                    $postDate=$row['postDate'];
                    $postImage=$row['postImage'];
                    $postContent=$row['postContent'];
                     $postViewCount=$row['postViewCount'];
                    
                    
                    
                   
                   ?>
                   
                   <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                
                
                
                <h2>
                    <a href="#"><?php echo $postTitle ?></a>
                </h2>
                <p class="lead">
                     by <a href="authorPost.php?PA=<?php echo $postAuthor ;?>&pId=<?php echo $postId ;?>"><?php echo $postAuthor ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage ?>" alt="">
                <hr>
                <p><?php echo $postContent ?></p>
                

                <hr>

                   
                 <?php  
                       
//                        $query="UPDATE post SET postViewCount = $postViewCount + 1";
//                    $query.="WHERE postId=$pId";
//                    $result=mysqli_query($connection,$query);
//                     if(!$result){
//                            die('Query Faild'.mysqli_error($connection));
//                                 }
                        
                       
                       
                       
//                       $postViewCount=$postViewCount + 1;
//                         $query="UPDATE post SET postViewCount = {$postViewCount}";
//                    $query.="WHERE postId=$pId";
//                    $result=mysqli_query($connection,$query);
//                     if(!$result){
//                            die('Query Faild'.mysqli_error($connection));
//                                 }
//               
                    
                    
                }
                           
                           
                
                ?>

               <!-- Blog Comments -->
                <?php   
                if(isset($_POST['createComment'])){
                 $commentPostId=$_GET['pId'];  
                 $commentAuthor=$_POST['commentAuthor'];
                 $commentEmail=$_POST['commentEmail'];
                 $commentContent=$_POST['commentContent'];
                    
                    if(!empty($commentAuthor) && !empty($commentEmail) && !empty($commentContent) ){
                        
                         $query="INSERT INTO comments(commentPostId,commentAuthor,commentEmail,commentContent,
                    commentStatus,commentDate
                    
                    )";
                    $query.="VALUES($commentPostId,'$commentAuthor','$commentEmail',
                                   '$commentContent','Approved',now())";
                     
                    
                    $result=mysqli_query($connection,$query);
                     if(!$result){
                            die('Query Faild'.mysqli_error($connection));
                                 }
                    
//                    $query="UPDATE post SET postCommentCount = postCommentCount + 1";
//                    $query.="WHERE postId=$commentPostId";
//                    $result=mysqli_query($connection,$query);
//                     if(!$result){
//                            die('Query Faild'.mysqli_error($connection));
//                                 }
                        
                        
                    
                    
                }
                    else{
                        
                        echo "<script>alert('Fields Cann't be Empty')</script>";
                    }
                 
                    }
                
                
                   
                ?>
               

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                       <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="commentAuthor" class="form-control">
                        </div>
                        
                        <div class="form-group">
                        <label for="email">Email</label>
                            <input type="email" name="commentEmail" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <label for="comment">Comment Here</label>
                            <textarea class="form-control" rows="3" name="commentContent"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="createComment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
              <?php
                 if(isset($_GET['pId'])){
                $pId=$_GET['pId'];
                }
                
                $query="SELECT * FROM comments WHERE commentPostId=$pId AND commentStatus='Approved' ORDER BY commentId DESC";
                
                 $result=mysqli_query($connection,$query);
                if(!$result){
                     die('Query Faild'.mysqli_error($connection));
                                 }
                    
                while($row=mysqli_fetch_assoc($result)){
                    $commentAuthor=$row['commentAuthor'];
                    $commentContent=$row['commentContent'];
                    $commentDate=$row['commentDate']
                
                     
                
                ?>
                
                <!-- Comment -->
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $commentAuthor ;?>
                            <small><?php echo $commentDate ;?></small>
                        </h4>
                       <?php echo $commentContent ;?>
                        <!-- Nested Comment -->
                        
                        
                        
                        
                        <!-- End Nested Comment -->
                    </div>
                </div>
              
              <?php } ?> 
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php include "include/sidebar.php"; ?>
          
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "include/footer.php"; ?>