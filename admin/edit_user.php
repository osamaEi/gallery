<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

        <!-- Navigation -->
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>



<?php



    
 
if(empty($_GET['id'])) {
    
    redirect ("users.php");
    
} 

$user =User::find_by_id($_GET['id']);
    
    
    if (isset($_POST['Update'])) {
        
        
 if($user) {
   
$user->username   = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name  = $_POST['last_name'];
$user->password   = $_POST['password'];
     
if(empty($_FILES['user_image'])) {
    
    $user->save();
    
}else{
     $user->set_file($_FILES['user_image']);
     
     $user->save_user_and_image();
    
    $user->save();
    
    redirect("edit_user.php?id={$user->id}");
     
}
     
 } 
       
        
    }else {
        
        if(isset($_POST['delete'])) {
           
            $user->delete();
            
            redirect("users.php");
            
        }
        
    }
        
    
   
    







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
                       
                        
                        <div class="col-md-6">
                       
                          
                            <a href="#" data-toggle="modal" data-target="#photo-library">  
                                <img class="img_responsive" src="<?php echo $user->image_path_and_placeholder(); ?>"width=270 height=350> 
                            </a>
                        
                            
                        
                        </div>
                        
                        
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            
                        <div class="col-md-5">
                            
                            <div class="form-group">
                            
                                
                            
                            <input type ="file" name="user_image" >
                            
                            </div>
                            
                          
                            
                    
                            <div class="form-group">
                            
                                <label for="username">Username</label>
                            
                            <input type ="text" name="username" class="form-control" value="<?php echo $user->username; ?>">
                            
                            </div>
                            
                          
                            
                            <div class="form-group">
                            
                             <label for="firstname">First Name</label>
                            
                            <input type ="text" name="first_name" class="form-control" value="<?php echo $user->first_name; ?>">
                            
                            </div>
                            
                             <div class="form-group">
                            
                                <label for="lastname">Last Name</label>
                            
                            <input type ="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>"> 
                                   
                            
                            </div>
                            
                            <div class="form-group">
                            
                                <label for="caption">Password</label>
                            
                    <input type ="password" name="password" class="form-control" value="<?php echo $user->password; ?>"> 
                                   
                            
                            </div>
                            
                            <div class="form-group">
                            
                                
                             <input type="submit" name="delete" class="btn btn-danger" value="delete" >
                                
                            <input type ="submit" name="Update" class="btn btn-primary pull_right" value="update"> 
                                   
                            
                           
                                
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