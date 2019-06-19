
 <?php 
  
if(isset($_POST['creatPost'])){
   
    $postCategoryId=$_POST['postCategory'];
    $postTitle=$_POST['postTitle'];
    $postAuthor=$_POST['postAuthor'];
    
    $postContent=$_POST['postContent'];
    $postCommentCount=0;
    $postStatus=$_POST['postStatus'];
    $postTags=$_POST['postTags'];
    $postDate = date('d-m-y');
    
    
  
  $msg = "";

 
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	

  	// image file directory
  	$target = "../images/".basename($image);

  	

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    
    $query="INSERT INTO post(postCategoryId,postTitle,postAuthor,postDate,postImage,postContent,postTags,postStatus) ";
    $query.="VALUES({$postCategoryId},'{$postTitle}','{$postAuthor}',now(),'{$target}',
    '{$postContent}','{$postTags}','{$postStatus}' )";
    

   $result= mysqli_query($connection,$query);
   $postId = mysqli_insert_id($connection);

    echo "<p class='bg-success'>post Added. <a href='../post.php?pId={$postId}'> View Post</a> or <a href='posts.php'> Edit More Post</a>" ;
    
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
    
    
}

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
</head>
<body>
     <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="postTitle">
        </div>
        
        
        <div class="form-group">
            <label for="title">Post Category Id</label>
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
        
        
        <div class="form-group">
            <label for="title">Post Author</label>
            <input type="text" class="form-control" name="postAuthor">
        </div>
        
        <div class="form-group">
            <label for="title">Post Status</label>
            
             <select name="postStatus" id="postStatus ">
          
                      
                   <option value='published'>Published</option>
                     <option value='draft'>draft</option>
                      
                
                      </select>

        </div>
        
        <div class="form-group">
            <label for="title">Post Image</label>
            <input type="file" name="image">
        </div>
        
        <div class="form-group">
            <label for="title">Post Tags</label>
            <input type="text" class="form-control" name="postTags">
        </div>
        
        
            
            <textarea name="postContent" id="body" class="form-control" cols="30" rows="10"></textarea>
       
        
          <script>
         ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
        
        <div class="form-group">
            <input type="submit" name="creatPost" value="Publish Post" class="btn btn-primary">
                               </div>
        
        
    </form>
    
    
    
</body>
</html>

   
    
 