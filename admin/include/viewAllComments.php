            <?php

                                        
             if(isset($_GET['UnApprove'])){
                
                 $IdUnApprove=$_GET['UnApprove']; 
                 
                 $query="UPDATE comments SET commentStatus='UnApproved' WHERE commentId= $IdUnApprove";
                $delete_category=mysqli_query($connection,$query);
                header("Location: comments.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
             }
                 
                 
                 
                 if(isset($_GET['Approve'])){
                
                 $IdApprove=$_GET['Approve']; 
                 $query="UPDATE comments SET commentStatus='Approved' WHERE commentId= $IdApprove";
                $delete_category=mysqli_query($connection,$query);
                header("Location: comments.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
                 }


                  
             if(isset($_GET['delete'])){
                
                 $commentDelete=$_GET['delete']; 
                 $query="DELETE FROM comments WHERE commentId = {$commentDelete}";
                $delete_category=mysqli_query($connection,$query);
                header("Location: comments.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
 
                    
                    
                }       
     ?>    
                            

                              <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>Id</th>       
                                     <th>Author</th>
                                     <th>Comment</th>
                                     <th>Email</th>
                                     <th>Status</th>
                                     <th>In Response To</th>
                                      <th>Date</th>
                                     <th>Approve</th>
                                      <th>UnApprove</th>
                                      <th>Delete</th>
                                     
                                 </tr>
                             </thead>
                             
                             <tbody>
                             <?php
                                 $query="SELECT * FROM comments";
                                 $selectPosts=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($selectPosts))
                                 {
                                    $commentId=$row['commentId'];
                                     $commentAuthor=$row['commentAuthor'];
                                     $commentEmail=$row['commentEmail'];
                                     $commentContent=$row['commentContent'];
                                     $commentStatus=$row['commentStatus'];
                                     $commentDate=$row['commentDate'];
                                     $commentPostId=$row['commentPostId'];
                                     
                                  
                             
                             
                                echo "<tr>";      
                                echo "<td>$commentId</td>";        
                                echo "<td>$commentAuthor</td>";     
                                echo " <td>$commentContent</td>"; 
                                echo "<td>$commentEmail</td>";  
                                echo "<td>$commentStatus</td>"; 
                                
                                  $query="SELECT * FROM post WHERE postId={$commentPostId}";
                                $select_category_id=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($select_category_id)){
                        
                                   $postTitle=$row['postTitle'];
                                   $postId=$row['postId'];
                                    
                                     
                                echo "<td><a href='../post.php?pId=$postId'>{$postTitle} </a></td>";  
                                 }
                                     
                                     
                                     
                                echo "<td>$commentDate</td>"; 
                                echo "<td><a href='comments.php?Approve=$commentId'>Approve</a></td>";     
                                
                                 echo "<td><a href='comments.php?UnApprove=$commentId'>UnApprove</a></td>";   
                                
                                 echo "<td><a href='comments.php?delete=$commentId'>Delete</a></td>";
                                
                                 
                                echo "</tr>";  
                             
                                 }
                                 ?>
                             
                                 
                            
                         </tbody>
                         </table>
                    
                        