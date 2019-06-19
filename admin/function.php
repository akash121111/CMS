<?php

function insertCategory(){
global $connection;
    
  if(isset($_POST['submit'])){
    
   
   
    $cat_title=$_POST['cat_title'];
    
    if($cat_title=='' || empty($cat_title)){
        echo "This Field Should Not Be Empty";
    }
    else{
        $query="INSERT INTO category(cat_name)";
    $query.="VALUE('$cat_title')";
    
    $result=mysqli_query($connection,$query);
    if(!$result){
        die('Query Faild'.mysqli_error($connection));
    }
 
    }


}

}


function selectAllCategory(){
    global $connection;
    $query="SELECT * FROM category";
                $select_category=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_category)){
                        
                   $cat_name=$row['cat_name'];
                    $cat_id=$row['cat_id'];
                    echo "<tr>";
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_name}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}''>Edit</a></td>";
                    echo "</tr>";                                      

                    }
}



//function deleteCategory(){
//     global $connection;
//      if(isset($_GET['delete'])){
//                
//                 $cat_id_delete=$_GET['delete']; 
//                $query="DELETE FROM category WHERE cat_id = {$cat_id_delete}";
//                $delete_category=mysqli_query($connection,$query);
//                header("Location: categories.php");
//                    
//                if(!$delete_category){
//                      die('Query Faild'.mysqli_error($connection));
//                 }
// 
//                    
//                    
//                }       
//    
//    
//    
//}

function useronline(){
    if(isset($_GET["onlineusers"])){
 global $connection;

 if(!$connection){
    session_start();
    include "../include/db.php";

$session=session_id();
$time=time();
$timeOutSecond=05;
$timeOut=$time-$timeOutSecond;

$query="SELECT * FROM usersOnline Where session='$session'";
$run=mysqli_query($connection,$query);
$count=mysqli_num_rows($run);


if($count== NULL){
    mysqli_query($connection,"INSERT INTO usersOnline (session,time) values('$session',$time)");
}
else{

 mysqli_query($connection,"UPDATE usersOnline SET time=
$time Where session='$session' ");

}

$query="SELECT * FROM usersOnline Where time > '$timeOut'";
$run=mysqli_query($connection,$query);   
echo $countOnlineUsers=mysqli_num_rows($run);


 }

   



                                         }//get request

              }
               useronline();




?>



