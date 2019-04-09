
 <?php 
  
if(isset($_POST['creatUser'])){
   
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


$userName  =mysqli_real_escape_string($connection,$userName);
 $userEmail     =mysqli_real_escape_string($connection, $userEmail);
$userPassword  =mysqli_real_escape_string($connection,$userPassword);

$userPassword=password_hash($userPassword, PASSWORD_BCRYPT , array('cost' => 10));

    
    $query="INSERT INTO users(userName,userFirstName,userLastName,userEmail,userPassword,userRole,userImage) ";
    $query.="VALUES('{$userName}','{$userFirstName}','{$userLastName}','{$userEmail}',
    '{$userPassword}','{$userRole}','{$target}')";
    
   $result= mysqli_query($connection,$query);
    echo "User Created: "."<a href='users.php'>View Users</a>";
    
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
          
        
        <div class="form-group">
            <label for="title">First Name</label>
            <input type="text" class="form-control" name="userFirstName">
        </div>
        
        <div class="form-group">
            <label for="title">Last Name</label>
            <input type="text" class="form-control" name="userLastName">
        </div>
        
       <div class="form-group">
           <select name="userRole" id="userRole ">
                     <option value='select option'>select option </option>
                     <option value='subscriber'>subscriber </option>
                      <option value='admin'>admin </option>
                      </select>
        </div>
        <div class="form-group">
            <label for="title">Username</label>
            <input type="text" class="form-control" name="userName">
        </div>
        <div class="form-group">
            <label for="title">Email</label>
            <input type="email" class="form-control" name="userEmail">
        </div>
        
        <div class="form-group">
            <label for="title">Password</label>
            <input type="password" class="form-control" name="userPassword">
        </div>
        
        <div class="form-group">
            <label for="title">Image</label>
            <input type="file" name="image">
        </div>
        
        
        
        
        <div class="form-group">
            <input type="submit" name="creatUser" value="Create" class="btn btn-primary">
                               </div>
        
        
    </form>
    
    
    
</body>
</html>

   
    
 