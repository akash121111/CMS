            <?php

                                        
             if(isset($_GET['subscriber'])){
                
                 $Idsubscriber=$_GET['subscriber']; 
                 
                 $query="UPDATE users SET userRole='subscriber' WHERE userId= $Idsubscriber";
                $delete_category=mysqli_query($connection,$query);
                header("Location: users.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
             }
                 
                 
                 
                 if(isset($_GET['admin'])){
                
                 $Idadmin=$_GET['admin']; 
                 $query="UPDATE users SET userRole='admin' WHERE userId= $Idadmin";
                $delete_category=mysqli_query($connection,$query);
                header("Location: users.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
                 }


                  
             if(isset($_GET['delete'])){
                
                 $userDelete=$_GET['delete']; 
                 $query="DELETE FROM users WHERE userId = {$userDelete}";
                $delete_category=mysqli_query($connection,$query);
                header("Location: users.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
 
                    
                    
                }       
     ?>    
                            

                              <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>Id</th>       
                                     <th>Username</th>
                                     <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Email</th>
                                     <th>Role</th>
                                     <th>Admin</th>
                                     <th>Subscriber</th>
                                     <th>Edit</th>
                                     
                                     <th>Delete</th>
                                      

                                     
                                 </tr>
                             </thead>
                             
                             <tbody>
                             <?php
                                 $query="SELECT * FROM users";
                                 $selectPosts=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($selectPosts))
                                 {
                                    $userId=$row['userId'];
                                     $userName=$row['userName'];
                                     $userFirstName=$row['userFirstName'];
                                     $userLastName=$row['userLastName'];
                                     $userEmail=$row['userEmail'];
                                     $userRole=$row['userRole'];
                                     
                                  
                             
                             
                                echo "<tr>";      
                                echo "<td>$userId</td>";        
                                echo "<td>$userName</td>";
                                echo " <td>$userFirstName</td>"; 
                                echo " <td>$userLastName</td>"; 
                                echo "<td>$userEmail</td>";  
                                echo "<td>$userRole</td>"; 
                                

                                echo "<td><a href='users.php?admin=$userId'>admin</a></td>";     
                                
                                 echo "<td><a href='users.php?subscriber=$userId'>subscriber</a></td>";   
                                echo "<td><a href='users.php?source=editUsers&uId={$userId}'>Edit</a></td>";
                                 echo "<td><a href='users.php?delete=$userId'>Delete</a></td>";
                                
                                 
                                echo "</tr>";  
                             
                                 }
                                 ?>
                             
                                 
                            
                         </tbody>
                         </table>
                    
                        