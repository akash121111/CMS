      <?php
   
     if(isset($_GET['uId'])){
     $userId=$_GET['uId'];
    if(isset($_POST['editUser'])){
        
        $userName=$_POST['userName'];
        $userFirstName=$_POST['userFirstName'];
        $userLastName=$_POST['userLastName'];
        $userEmail=$_POST['userEmail'];
        $userPassword=$_POST['userPassword'];
        $userRole=$_POST['userRole'];
        
   
     $user_image          =  $_FILES['image']['name'];
        $user_image_temp     =   $_FILES['image']['tmp_name'];
   
   move_uploaded_file($user_image_temp, "../images/$user_image"); 
        
        
        
      
        if(empty($user_image)) {
        
        $query = "SELECT * FROM users WHERE userId = $userId ";
        $select_image = mysqli_query($connection,$query);
            
        while($row = mysqli_fetch_array($select_image)) {
            
           $user_image = $row['userImage'];
        
        }
        
        
}
  
 
        
        
//          $query="SELECT randSalt from users";
// $selectRAndomSalt=mysqli_query($connection,$query);
// if(!$selectRAndomSalt){
//     die("QUERY FAILD" .mysqli_error($connection) );
// }
    
//     $row=mysqli_fetch_array($selectRAndomSalt);
//    $salt=$row['randSalt'];
    
//     $userPassword=crypt($userPassword,$salt);

$userName  =mysqli_real_escape_string($connection,$userName);
 $userEmail     =mysqli_real_escape_string($connection, $userEmail);
$userPassword  =mysqli_real_escape_string($connection,$userPassword);

$userPassword=password_hash($userPassword, PASSWORD_BCRYPT , array('cost' => 10));
   
        
        
        
    
    $query="UPDATE users SET userName='{$userName}',userFirstName='{$userFirstName}',userImage='{$user_image}',userEmail='{$userEmail}',userPassword='{$userPassword}',userLastName='{$userLastName}',userRole='{$userRole}' WHERE userId='{$userId}' ";
    
    
   $result= mysqli_query($connection,$query);
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
   
     }
    }

      ?>
        <?php
                                        
             if(isset($_GET['uId'])){
                
                 $edituser=$_GET['uId']; 
                 $query="SELECT * FROM users WHERE userId='$edituser'";
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
                     
                         
    <option value="<?php echo $userRole; ?>"><?php echo $userRole; ?></option>
       <?php 

          if($userRole == 'admin') {
          
             echo "<option value='subscriber'>subscriber</option>";
          
          } else {
          
            echo "<option value='admin'>admin</option>";
          
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
            <input type="submit" name="editUser" value="Update" class="btn btn-primary">
                               </div>
        
        
    </form>
    
    
    
</body>
</html>

         <?php
                  }
                 }
     ?>    
