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
                      
             if(isset($_GET['page'])){
                 $page=$_GET['page'];
                
             }
             else{
                 $page="";
             }
             if($page=="" || $page==1){
                 $page1=0;
             }
             else{
                 $page1=($page * 5 ) - 5;
             }
             ?>
                
                <?php
                
                $query="SELECT * FROM post";
                $countAllPost=mysqli_query($connection,$query);
                $count=mysqli_num_rows($countAllPost);
                $count=ceil($count/4);
            
             
             
             
           
            $query="SELECT * FROM post LIMIT $page1,5";
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
                    by <a href="authorPost.php?PA=<?php echo $postAuthor ;?>&pId=<?php echo $postId ;?>"><?php echo $postAuthor ?></a>
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
           
                
                
                ?>

               
              
              
               
            </div>

            <!-- Blog Sidebar Widgets Column -->
          <?php include "include/sidebar.php"; ?>
          
        </div>
        <!-- /.row -->

        <hr>
        
   
        
             
        
         
         <ul class="pager">
           <?php
               for($i=1;$i<=$count;$i++){
                   
                   
                   if($i==$page){
                      echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>"; 
                       
                   }
                   else{
                     echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";  
                   }
                   
                
               
                   
               
              } ?>
          
<<<<<<< HEAD
          
=======
>>>>>>> 4390161d9d2d49dba254c865920cba6acbb0f88b
        
        

        <!-- Footer -->
        <?php include "include/footer.php"; ?>