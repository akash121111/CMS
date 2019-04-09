<?php include "include/adminHeader.php"; ?>
   

    <div id="wrapper">

        <!-- Navigation -->
        
        <?php include "include/adminNavigation.php"; ?>
   

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Akash</small>
                        </h1>
                         
                            <div class="col-xs-6">
                               
                               <?php 
                                insertCategory();
                                ?>
        
                               <form action="" method="post">
                               <label for="cat-title">Add Category</label>
                               <div class="form-group">
                                   <input type="text" name="cat_title" class="form-control">
                               </div>
                               <div class="form-group">
                                   <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                               </div>
                               
                               
                               
                               </form>
                               
                              <?php
                                if(isset($_GET['edit'])){
                                    
                                    $cat_id=$_GET['edit'];
                                    include "include/update_category.php";
                                }
                                
                                ?>
                        
                                
                            </div>
                             
                            
                            <div class="col-xs-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
             <?php    //Select all category
                 selectAllCategory(); ?>
                                    
            <?php
                                        
             if(isset($_GET['delete'])){
                
                 $cat_id_delete=$_GET['delete']; 
                $query="DELETE FROM category WHERE cat_id = {$cat_id_delete}";
                $delete_category=mysqli_query($connection,$query);
                header("Location: categories.php");
                    
                if(!$delete_category){
                      die('Query Faild'.mysqli_error($connection));
                 }
 
                    
                    
                }       
     ?>    
                                    
                                    </tbody>
                                </table>
                                    
                            </div>
                            
                            
                         
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        
        
        

     <?php include "include/adminFooter.php"; ?>