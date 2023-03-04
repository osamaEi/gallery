<?php


function __autoload($class) {
    
   $class=strtolower($class);
    
    $the_path = "includes/{$class}.php";
    
    
    
    
    if (file_exists($the_path)) {
        
        require_once($the_path);
        
    }
    
    else{
        $Another_path="admin/includes/{$class}.php";
        require_once($Another_path);
        
    }
    
 
    
    
}


function redirect($location) {
    
    header("location: {$location}");
    
}









?>