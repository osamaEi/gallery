<?php include("includes/header.php"); ?>

        <!-- Navigation -->
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>



<?php



    
    //$user = User::find_by_id($_GET['id']);
    
$user= new User();
    
    if (isset($_POST['create'])) {
        
        
 if($user) {
   
$user->username   = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name  = $_POST['last_name'];
$user->password   = $_POST['password'];
     

     $user->set_file($_FILES['user_image']);
     
     $user->save_user_and_image();
     
     
 } 
       
        
        
        
    }
    //if(isset($_POST['update'])) {
    
    //    if($user) {
            
    //       $user->title =$_POST['title'];
   //        $user->caption = $_POST['caption'];
    //       $user->alternate_text = $_POST['alternate_text'];
    //       $user->description = $_POST['description'];
            
           // $user->save();
      //      
      //  }

    
//}
    
    
    









//$users =user::find_all();



?>













<?php include("includes/admin_navigation.php"); ?>



            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          
<?php include("includes/admin_sidebar.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users
                            
                            
                        </h1>
                       
                        <form action="" method="post" enctype="multipart/form-data">
                            
                        <div class="col-md-5 col-md-offset-3">
                            
                            <div class="form-group">
                            
                                
                            
                            <input type ="file" name="user_image" >
                            
                            </div>
                            
                          
                            
                    
                            <div class="form-group">
                            
                                <label for="username">Username</label>
                            
                            <input type ="text" name="username" class="form-control">
                            
                            </div>
                            
                          
                            
                            <div class="form-group">
                            
                             <label for="firstname">First Name</label>
                            
                            <input type ="text" name="first_name" class="form-control">
                            
                            </div>
                            
                             <div class="form-group">
                            
                                <label for="lastname">Last Name</label>
                            
                            <input type ="text" name="last_name" class="form-control"> 
                                   
                            
                            </div>
                            
                            <div class="form-group">
                            
                                <label for="caption">Password</label>
                            
                            <input type ="password" name="password" class="form-control"> 
                                   
                            
                            </div>
                            
                            <div class="form-group">
                            
                                
                            
                            <input type ="submit" name="create" class="btn btn-primary"> 
                                   
                            
                            </div>
                            
                             
                            
                        </div>
                        
                        
                     
                    

                        </form>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            
            
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>