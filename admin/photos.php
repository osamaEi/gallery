<?php include("includes/header.php"); ?>

        <!-- Navigation -->
<?php if(!$session->is_signed_in()) {redirect("login.php");}?>



<?php


$photos =Photo::find_all();



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
                            Photos
                            <small>Subheading</small>
                        </h1>
                       
                        
                        <div class="col-md-12">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                    
                                
                                </tr>
                                
                                
                            </thead>
                                
                                <tbody>
                                    
                                    <?php foreach ($photos as $photo) :?>
                                    <tr>
                                    
                                        <td><img src="<?php echo $photo->picture_path()?>" width=150 height=200 alt="">
                                            
                                            <div class="action_links"> 
                                            
                                                <a href="delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                                <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                                <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                              
                                            
                                            </div>
                                            
                                            
                                            
                                        </td>
                                        <td><?php echo $photo->id; ?></td>
                                        <td><?php echo $photo->filename; ?></td>
                                        <td><?php echo $photo->title; ?></td>
                                        <td><?php echo $photo->size; ?></td>
                                        
                                        <td> 
                                        
                                        <?php
                                            
                                       $comments = Comment::find_the_comment($photo->id);
                                            
                                            ?>
                                            
        <a href="photo_comment.php?id=<?php echo $photo->id;  ?>"><?php  echo count($comments); ?></a>
                                            
                                       
                                        
                                        </td>
                                        
                                       
                                    
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