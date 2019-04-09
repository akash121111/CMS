      <?php
   
     if(isset($_GET['pId'])){
     $postId=$_GET['pId'];
    if(isset($_POST['editPost'])){
     
 //    $postCategory=$_POST['postCategory'];
//     $query="SELECT * FROM category WHERE cat_name='{$postCategory}'";
//     $select_category=mysqli_query($connection,$query);
//        while($row=mysqli_fetch_assoc($select_category)){
//                        
//             
//             $cat_id=$row['cat_id']; 
//        
        
    $postTitle=$_POST['postTitle'];
    $postAuthor=$_POST['postAuthor'];
    
    $postContent=$_POST['postContent'];
    $postStatus=$_POST['postStatus'];
    $postTags=$_POST['postTags'];
        $postDate = date('d-m-y');
       
         $post_image          =  $_FILES['image']['name'];
        $post_image_temp     =   $_FILES['image']['tmp_name'];
   
   move_uploaded_file($post_image_temp, "../images/$post_image"); 
        
        
        
      
        if(empty($post_image)) {
        
        $query = "SELECT * FROM post WHERE postId = $postId ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $post_image = $row['postImage'];
        
        }
        
        
}

    
    $query="UPDATE post SET postTitle='{$postTitle}',postAuthor='{$postAuthor}',postImage='{$post_image}',postContent='{$postContent}',postTags='{$postTags}',postDate=now(),postStatus='{$postStatus}' WHERE postId='{$postId}' ";
    
    
   $result= mysqli_query($connection,$query);
        
    
    echo "<p class='bg-success'>post updated. <a href='../post.php?pId={$postId}'> View Post</a> or <a href='posts.php'> Edit More Post</a>" ;
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
        }
    // }
    }
     

      ?>
                                       

                                        
         <?php
                                        
             if(isset($_GET['pId'])){
                
                 $editPost=$_GET['pId']; 
                 $query="SELECT * FROM post WHERE postId='$editPost'";
                 $selectPosts=mysqli_query($connection,$query);
                  while($row=mysqli_fetch_assoc($selectPosts))
                  {
                        
                         $postCategoryId=$row['postCategoryId'];
                         $postTitle=$row['postTitle'];
                         $postAuthor=$row['postAuthor'];
                         $postDate=$row['postDate'];
                         $postImage=$row['postImage'];
                         $postCommentCount=$row['postCommentCount'];
                         $postStatus=$row['postStatus'];
                         $postTags=$row['postTags'];
                         $postContent=$row['postContent'];
                      
                      
                      
            ?>          
                 

    
</head>
<body>
     <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" value="<?php echo $postTitle ;?>" class="form-control" name="postTitle">
        </div>
        
        
        <div class="form-group">
           <select name="postCategory" id="postCategory ">
            <?php
                      
                 $query="SELECT * FROM category";
                $select_category=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_category)){
                        
                        $cat_name=$row['cat_name'];
                         $cat_id=$row['cat_id'];        
                      
                      
                      
                     echo "<option value='$cat_id'>$cat_name </option>";
                      
                    }
                      
                      ?>
                      </select>
        </div>
        
        </div>
        
        
        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" value="<?php echo $postAuthor ;?>" class="form-control" name="postAuthor">
        </div>
        
        <div class="form-group">
            <label for="title">Post Status</label>
            
             <select name="postStatus" id="postStatus ">
          
                      
                   <option value='postStatus'> <?php echo $postStatus ;?></option>
                    <?php
                      if($postStatus == 'published'){
                        echo "<option value='draft'>Draft</option>";
                      }
                      else{
                           echo "<option value='published'>Published</option>";
                      }
                      
                      
                      ?>
                     
                      
                
                      </select>

          
        </div>
        
        <div class="form-group">
            
            <img width="100" src="../images/<?php echo $postImage ;?>" alt="">
        </div>
        <div class="form-group">
            
            <input type="file" name="image">
        </div>
        
        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" value="<?php echo $postTags ;?>" class="form-control" name="postTags">
        </div>
        
        
            
            <textarea name="postContent"  id="body" class="form-control" cols="30" rows="10"> <?php echo $postContent ;?>
            </textarea>
        </div>
        
        
        
        <div class="form-group">
            <input type="submit" name="editPost" value="Publish Post" class="btn btn-primary">
                               </div>
        
        
    </form>
    
         <?php
                  }
                                  
                 }
     ?>    
