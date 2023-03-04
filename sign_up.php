<?php include("includes/header.php"); ?>
<?php


 $message="";

$user= new User();
    
    if (isset($_POST['submit'])) {
        
        
 if($user) {
   
$user->username   = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name  = $_POST['last_name'];
$user->password   = $_POST['password'];
     

     
     
    if($user->save()){
        
        $message="Welcome To the First Project of Osame Eid";
        $message.="<a href='admin/login.php'><small>Go To login page</small></a>";
    } 
     
     
 } 
       
    }



?>


<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $message; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
	<label for="first_name">First name</label>
	<input type="text" class="form-control" name="first_name">

</div>

<div class="form-group">
	<label for="last_name">Last name</label>
	<input type="text" class="form-control" name="last_name">
	
</div>
<div class="form-group">
	<label for="username">Username</label>
	<input type="text" class="form-control" name="username">

</div>

<div class="form-group">
	<label for="password">Password</label>
	<input type="password" class="form-control" name="password">
	
</div>


<div class="form-group">
<input type="submit" name="submit" value="Sign In" class="btn btn-primary">

</div>


</form>


</div>
