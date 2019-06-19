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
                          
                        </h1>
  <?php
   
     if(isset($_SESSION['userName'])){
                
    $userName=$_SESSION['userName'];
    if(isset($_POST['editUser'])){
        
        $userName=$_POST['userName'];
        $userFirstName=$_POST['userFirstName'];
        $userLastName=$_POST['userLastName'];
        $userEmail=$_POST['userEmail'];
        $userPassword=$_POST['userPassword'];
        $userRole=$_POST['userRole'];
        
   
   
  
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

    
    $query="UPDATE users SET userFirstName='{$userFirstName}',userImage='{$target}',userEmail='{$userEmail}',userPassword='{$userPassword}',userLastName='{$userLastName}',userRole='{$userRole}' WHERE userName='{$userName}' ";
    
    
   $result= mysqli_query($connection,$query);
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
   
     }
    }

      ?>
        <?php
                                        
             if(isset($_SESSION['userName'])){
                
                 $edituser=$_SESSION['userName']; 
                 $query="SELECT * FROM users WHERE userName='$edituser'";
                 $selectPosts=mysqli_query($connection,$query);
                  while($row=mysqli_fetch_assoc($selectPosts))
                  {
                         $userId=$row['userId'];
                         $userName=$row['userName'];
                         $userFirstName=$row['userFirstName'];
                         $userLastName=$row['userLastName'];
                         $userEmail=$row['userEmail'];
                         $userPassword=$row['userPassword'];
                         $userRole=$row['userRole'];
                        $userImage=$row['userImage'];
            ?>          
                 

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Users</title>
    
</head>
<body>
     <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          
        
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" value="<?php echo $userFirstName ;?>" class="form-control" name="userFirstName">
        </div>
        
        <div class="form-group">
            <label for="title">Last Name</label>
            <input type="text" value="<?php echo $userLastName ;?>" class="form-control" name="userLastName">
        </div>
        
       <div class="form-group">
           <select name="userRole" id="userRole ">
          
                      
                   <option value='$userRole'> <?php echo $userRole ;?></option>
                    <?php
                      if($userRole == 'admin'){
                        echo "<option value='subscriber'>Subscriber</option>";
                      }
                      else{
                           echo "<option value='admin'>Admin</option>";
                      }
                      
                      
                      ?>
             
                      </select>
           
        </div>
        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" value="<?php echo $userName ;?>" class="form-control" name="userName">
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" value="<?php echo $userEmail ;?>" class="form-control" name="userEmail">
        </div>
        
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" value="<?php echo $userPassword ;?>" class="form-control" name="userPassword">
        </div>
        <div class="form-group">
            
            <img width="100" src="../images/<?php echo $userImage ;?>" alt="">
        </div>
        <div class="form-group">
            <label for="title">Image</label>
            <input type="file" name="image">
        </div>
        
        
        
        
        <div class="form-group">
            <input type="submit" name="editUser" value="Create" class="btn btn-primary">
                               </div>
        
        
    </form>
    
    
    
</body>
</html>

         <?php
                  }
                 }
     ?>    

   
             
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        
        
        

     <?php include "include/adminFooter.php"; ?>