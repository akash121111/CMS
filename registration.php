<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>
 

    <!-- Navigation -->
    
<?php include "include/navigation.php"; ?>
   
<?php

if(isset($_POST['submit'])){
    
    $username=$_POST['username'];
    $email=$_POST['email'];
    $userPassword=$_POST['userPassword'];




if(!empty($username) && !empty($email) && !empty($userPassword)){

$username  =mysqli_real_escape_string($connection,$username);
$email     =mysqli_real_escape_string($connection,$email);
$userPassword  =mysqli_real_escape_string($connection,$userPassword);

$userPassword=password_hash($userPassword, PASSWORD_BCRYPT , array('cost' => 12));

//     $query="SELECT randSalt from users";
// $selectRAndomSalt=mysqli_query($connection,$query);
// if(!$selectRAndomSalt){
//     die("QUERY FAILD" .mysqli_error($connection) );
// }
    
//     $row=mysqli_fetch_array($selectRAndomSalt);
//    $salt=$row['randSalt'];
    
//     $userPassword=crypt($userPassword,$salt);
   
     $query="INSERT INTO users(userName,userEmail,userPassword,userRole) ";
    $query.="VALUES('{$username}','{$email}',
    '{$userPassword}','subscriber')";
    
   $result= mysqli_query($connection,$query);
   $msg="Registration has been submitted";
    
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
  
} 
    else{
       $msg="Field's can't be empty";
    }
    
    
    
    
}
else{
   $msg="";
}


   
   
   
?>    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $msg ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="userPassword" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
