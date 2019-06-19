<?php include "include/adminHeader.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        
<?php include "include/adminNavigation.php"; ?>               
        
<<<<<<< HEAD
        <button class="qwe" onclick="hello()">Hello</button>
=======
        
>>>>>>> 4390161d9d2d49dba254c865920cba6acbb0f88b

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->



          
                
                
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            
                            <small><?php echo $_SESSION['userName'] ; ?></small>
                        </h1>

                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->


                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                
                            $query="SELECT * FROM post";
                            $select=mysqli_query($connection,$query);
                            $postCount=mysqli_num_rows($select);
                            echo "<div class='huge'> $postCount </div>";         
                
                ?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
                
                           $query="SELECT * FROM comments";
                           $select=mysqli_query($connection,$query);
                           $commentCount=mysqli_num_rows($select);
                           echo "<div class='huge'>$commentCount</div>";         
                
                ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                
                           $query="SELECT * FROM users";
                           $select=mysqli_query($connection,$query);
                           $usersCount=mysqli_num_rows($select);
                           echo "<div class='huge'>$usersCount</div>";         
                
                ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       <?php
                
                           $query="SELECT * FROM category";
                           $select=mysqli_query($connection,$query);
                           $categoryCount=mysqli_num_rows($select);
                           echo " <div class='huge'>$categoryCount</div>";         
                
                ?>
                       
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
<?php
    
    $query="SELECT * FROM post Where postStatus='published'";
        $select=mysqli_query($connection,$query);
        $postPublishedCount=mysqli_num_rows($select);   
                
      $query="SELECT * FROM post Where postStatus='draft'";
        $select=mysqli_query($connection,$query);
        $postDraftCount=mysqli_num_rows($select);    
                
         $query="SELECT * FROM comments Where commentStatus='unapproved'";
           $select1=mysqli_query($connection,$query);
           $commentUnapprovedCount=mysqli_num_rows($select1);
                
                
        $query="SELECT * FROM users Where userRole='subscriber'";
           $select2=mysqli_query($connection,$query);
           $usersSubscriberCount=mysqli_num_rows($select2);
                
                
                ?>
                
                
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','Count'],
        <?php
         $elementText=['All Post','Active Post','Draft Post','Comments','Pending Comments','Users','Subscriber Users','Category'];
        $elementCount=[$postCount,$postPublishedCount,$postDraftCount,$commentCount,$commentUnapprovedCount,$usersCount,$usersSubscriberCount,$categoryCount];
            for($i=0;$i < 8 ;$i++){
                
                echo "['{$elementText[$i]}'".","."{$elementCount[$i]}],";
            }
            
            
            ?>
          
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
               
    
                    
                                    
                                                    
    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>                                                                                
  
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        
        
        

     <?php include "include/adminFooter.php"; ?>