<?php

require_once "Controller/ControllerIndex.php";
require_once "Controller/ControllerPoem.php";
require_once "View/view.php";

class Router {
    
    private $ctrlIndex;
    private $ctrlPoem;
    
    public function __construct() {
        $this->ctrlIndex = new ControllerIndex();
        $this->ctrlPoem  = new ControllerPoem();
    }
    
    // Handle an incoming request
    public function queryRouter() {
        
        try {
    
            if(!isset($_GET['action'])) {
                $this->ctrlIndex->index();
                return;
            }    
                
            if ($_GET['action'] !== 'poem') {
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
            $this->ctrlPoem->poem($idPoem);
         
            
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        
    }
    
    // Display an error
    private function error($errorMessage) {
        $view = new View("Error");
        $view->generate(array("errorMessage" => $errorMessage));
    }
    
}
