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
                            <small><?php echo $_SESSION['userName'] ; ?></small>
                        </h1>
                        
<?php
                        
  if(isset($_GET['source']))  {
      
      $source=$_GET['source'];
      
  }   
  else{
      $source='';
  }
                        
                        
switch($source){
        
    case 'addPost':
        include "include/addPost.php";
        break;
    case 'editPost':
        include "include/editPost.php";
        break;
    case '100':
        echo "32";
        break;
    case '32':
        echo "32";
        break;
    default:
        include "include/viewAllPosts.php";
        break;
        
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