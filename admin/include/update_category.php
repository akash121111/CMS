 
                               
                               <form action="" method="post">
                               <label for="cat-title">Edit Category</label>
                               
                                <?php
                                        
                if(isset($_GET['edit'])){
                
                
                 $cat_id=$_GET['edit']; 
                
                  
                $query="SELECT * FROM category WHERE cat_id='{$cat_id}'";
                $select_category=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_category)){
                        
                        $cat_name=$row['cat_name'];
                        $cat_id=$row['cat_id'];
                        
                    ?>   
                    <input value="<?php if(isset($cat_name)) { echo $cat_name ;} ?>" type="text" name="cat_title_edit" class="form-control">
                      
                    <?php    
                        
                        
                    }
                }
                                     
            ?>   
                    <?php 
         
                         if(isset($_POST['submitUpdate'])){
                          global $connection;
                        $cat_name=$_POST['cat_title_edit'];
                        

                          $query="UPDATE category SET cat_name ='{$cat_name}'  WHERE cat_id= {$cat_id}";


                         $result=mysqli_query($connection,$query);
                          if(!$result){
     
                            die('Query Faild'.mysqli_error());
                         }



                         }

        
   
       
        
        
                   ?>
                        
                               
                                
                                 
                                   
                               <div class="form-group">
                                   <input type="submit" name="submitUpdate" value="Update Category" class="btn btn-primary">
                               </div>
                               
                               
                               
                               </form>