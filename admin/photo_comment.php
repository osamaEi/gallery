<?php include("includes/header.php"); ?>

        <!-- Navigation -->
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>



<?php


if(empty($_GET['id'])) {
    
    
    redirect ("photos.php");
} 

$comments = Comment::find_the_comment($_GET['id']);
    
    


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
                            
                            comments
                           
                            
                        </h1>
                       
                        <a href ="add_comment.php" class="btn btn-primary">Add comment</a>
                        
                        
                        
                        <div class="col-md-12">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>body</th>
                                    
                                    
                                
                                </tr>
                                
                                
                            </thead>
                                
                                <tbody>
                                    
                                    <?php foreach ($comments as $comment) :?>
                                    <tr>
                                       <td><?php echo $comment->id; ?></td>

                                            
                                             <td><?php echo $comment->author; ?>
                                            <div class="actions_link"> 
                                            
                                                <a href="delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                                
                                               <!-- <a href="#">View</a> -->
                                              
                                            
                                            </div>
                                            
                                            
                                            
                                        </td>
                                       
                                       
                                        <td><?php echo $comment->body; ?></td>
                                    
                                    </tr>
                                    
                                <?php endforeach; ?>
                                    
                                </tbody>
                                
                                
                                
                                
                            </table><!--END OF TABLE-->
                        </div>
                        
                        
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            
            
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>