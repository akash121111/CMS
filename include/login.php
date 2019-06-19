<?php include "db.php";

session_start();

if(isset($_POST['login'])){
    
    $username=$_POST['username'];
    $userPassword=$_POST['userPassword'];
    
    $username=mysqli_real_escape_string($connection,$username);
    $userPassword=mysqli_real_escape_string($connection,$userPassword);
    
    $query="SELECT * from users WHERE username='{$username}'";
    
    
    $result=mysqli_query($connection,$query);
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
    while($row=mysqli_fetch_assoc($result)){
    
        
    $dbuserName=$row['userName'];
    $dbuserPassword=$row['userPassword'];
    $dbuserId=$row['userId'];
    $dbuserFirstName=$row['userFirstName'];
    $dbuserLastName=$row['userLastName'];
    $dbuserRole=$row['userRole'];
    }
    //$userPassword=crypt($userPassword,$dbuserPassword);
    
    if(password_verify($userPassword,$dbuserPassword  )){
        $_SESSION['userName']=$dbuserName;
     $_SESSION['userFirstName']=$dbuserFirstName;
     $_SESSION['userLastName']=$dbuserLastName;
     $_SESSION['userRole']=$dbuserRole;
        header("Location: ../admin ");
        
    }
    else{
       header("Location: ../index.php "); 
    }
    

}


?>