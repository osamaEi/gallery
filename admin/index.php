<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");}?>

        <!-- Navigation -->

<?php include("includes/admin_navigation.php"); ?>



            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          
<?php include("includes/admin_sidebar.php"); ?>


            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

 <?php include("includes/admin_content.php"); ?>
            
            
        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>