<?php

class Cars {
    
    
    var $wheels =4;
    
    function kind() {
        
        echo "This Car has ". $this->wheels. "Wheels";
        
    }
    
    

    
}

$bmw = new Cars();

$bmw->kind();




?>