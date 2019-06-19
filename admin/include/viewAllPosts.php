            <?php
                                        
             if(isset($_GET['delete'])){
                
                 $cat_id_delete=$_GET['delete']; 
                $query="DELETE FROM post WHERE PostId = {$cat_id_delete}";
                $delete_category=mysqli_query($connection,$query);
                header("Location: posts.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
 
                    
                    
                }       
    ?>    
       <form action="" method="post">

          <table class="table table-bordered table-hover">
                  <div id="bulkOptionContainer" class="col-xs-4">
                     <select name="bulkOption" id="" class="form-control">
                         <option value="">Select Option</option>
                         <option value="published">Published</option>
                         <option value="draft">Draft</option>
                         <option value="delete">Delete</option>
                         <option value="clone">Clone</option>
                     </select> 


                  </div>
                  <div class="col-xs-4">
                    <input type="submit" name="submit" class="btn btn-success" value="Apply">
                    <a class="btn btn-primary" href="posts.php?source=addPost">Add New Post</a>
                  </div>




         <thead>
             <tr>
                <th><input type="checkbox" id="selectAll"></th>
                 <th>Id</th>
                 <th>Author</th>
                 <th>Title</th>
                 <th>Category</th>
                 <th>Status</th>
                 <th>Image</th>
                 <th>Tags</th>
                 <th>Comments</th>
                 <th>Date</th>
                 <th>View</th>
                 <th>Edit</th>
                 <th>Delete</th>
<!--
                 <a href="tel:+917055929159">+917055929159</a>
                 <a href="mailto:alokakk3098@gmail.com">alokakk3098@gmail.com</a>
-->
             </tr>
         </thead>

         <tbody>
         <?php
             $query="SELECT * FROM post";
             $selectPosts=mysqli_query($connection,$query);
             while($row=mysqli_fetch_assoc($selectPosts))
             {
                $postId=$row['postId'];
                 $postCategoryId=$row['postCategoryId'];
                 $postTitle=$row['postTitle'];
                 $postAuthor=$row['postAuthor'];
                 $postDate=$row['postDate'];
                 $postImage=$row['postImage'];
                 $postCommentCount=$row['postCommentCount'];
                 $postStatus=$row['postStatus'];
                 $postTags=$row['postTags'];



            echo "<tr>";   
                 ?>
            <td><input class='checkBoxes' type='checkbox' name="checkBoxArray[]" value="
            <?php echo $postId ; ?>"></td> 
            
            <?php
            echo "<td>$postId</td>";     
            echo "<td> $postAuthor</td>";      
            echo "<td>$postTitle</td>";  
            $query="SELECT * FROM category WHERE cat_id={$postCategoryId}";
            $select_category_id=mysqli_query($connection,$query);
             while($row=mysqli_fetch_assoc($select_category_id)){

               $cat_name=$row['cat_name'];


            echo "<td>{$cat_name} </td>";  
             }

            echo "<td>$postStatus</td>";      
            echo "<td><img width='100' src='../images/$postImage' alt='image'></td>";      
            echo " <td>$postTags</td>";     
            echo "<td>$postCommentCount</td>";      
            echo "<td>$postDate</td>"; 
            echo "<td><a href='../post.php?pId={$postId}'>View Post</a></td>"; 
            echo "<td><a href='posts.php?source=editPost&pId={$postId}'>Edit</a></td>";     

             echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \"  href='posts.php?delete={$postId}'>Delete</a></td>";


            echo "</tr>";  

             }
             ?>



     </tbody>
     </table>

    </form>
    
   <?php
if(isset($_POST['checkBoxArray'])){
    
   foreach($_POST['checkBoxArray'] as $checkBox){
       
    
       $bulkOption=$_POST['bulkOption'];
       
       switch($bulkOption){
               
           case 'published':
               
               $query="UPDATE post SET postStatus='published' where postId=$checkBox";
               mysqli_query($connection,$query);
               header("Location: posts.php");
               break;
          case 'draft':
               
               $query="UPDATE post SET postStatus='draft ' where postId=$checkBox";
               mysqli_query($connection,$query);
               header("Location: posts.php");
               break;
               
         case 'delete':
               
               $query="DELETE FROM post where postId=$checkBox";
               mysqli_query($connection,$query);
               header("Location: posts.php");
               break;
               
           case 'clone':
                $query="SELECT * FROM post WHERE postId='$checkBox'";
                 $selectPosts=mysqli_query($connection,$query);

                  while($row=mysqli_fetch_array($selectPosts))
                  {
                        
                         $postCategoryId=$row['postCategoryId'];
                         $postTitle=$row['postTitle'];
                         $postAuthor=$row['postAuthor'];
                         $postDate=$row['postDate'];
                         $postImage=$row['postImage'];
                         $postStatus=$row['postStatus'];
                         $postTags=$row['postTags'];
                         $postContent=$row['postContent'];
                         echo "".$postTitle;

                  }
                 
                
    $query2="INSERT INTO post(postCategoryId,postTitle,postAuthor,postDate,postImage,postTags,postStatus) ";
    $query2.="VALUES({$postCategoryId},'{$postTitle}','{$postAuthor}',now(),'{$postImage}',
    '{$postTags}','{$postStatus}' )";
    

   $result= mysqli_query($connection,$query2);
  

    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
          
               break;                   
    
                      
       }
       
      
       
       
       
       
       
       
       
       
   }
    
    
}





?>