<?php

require 'model.php';

try {
    
    if (isset($_GET['id'])) {
        
        $id = intval($_GET['id']);
        
        if($id != 0) {
            
            $poem     = getaPoem($id);
            $comments = getComments($id);
            
            require 'viewPoem.php';
            
        } else {
            throw new Exception("Poem ID not correct...");
        }
        
    } else {
        throw new Exception("No Poem ID...");
    }
    
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require "viewError.php";
}