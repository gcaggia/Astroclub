<?php 

        
//Model
require 'model.php';

//View 
try {
    $poems = getPoems(); 
    require 'viewIndex.php';
    
} catch (Exception $e) {
    echo '<html><body>Error ! ' . $e->getMessage() . '</body></html>'; 
}

