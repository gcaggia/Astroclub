<?php 

require "Controller/controller.php";

try {
    
    if(!isset($_GET['action'])) {
       index();
       return;
    }    
        
    if ($_GET['action'] !== 'billet') {
      throw new Exception("Invalid action.");
    }
    
    if (!isset($_GET['id'])) {
      throw new Exception("No Poem ID.");
    }
    
    $idPoem = intval($_GET['id']);
    
    if ($idPoem === 0) {
        throw new Exception("Poem ID not correct...");
    }
    
    // We call the controller
    poem($idPoem);
 
    
} catch (Exception $e) {
    error($e->getMessage());
}