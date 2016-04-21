<?php

require_once "Controller/ControllerIndex.php";
require_once "Controller/ControllerPoem.php";
require_once "View/View.class.php";

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
            
            $action = $_GET['action'];
                
            if ($action != 'poem' && $action != "comment") {
              throw new Exception("Invalid action.!");
            }
            
            //Specific poem display
            if ($action == 'poem') {
                
                $idPoem = intval($this->getParam($_GET, 'id'));
            
                if ($idPoem === 0) {
                    throw new Exception("Poem ID not correct...");
                }
            
                // We call the controller
                $this->ctrlPoem->poem($idPoem);
                
            } else {
                
                $author  = $this->getParam($_POST, 'author');
                $content = $this->getParam($_POST, 'txt-comment');
                $idPoem  = $this->getParam($_POST, 'id');
                
                $this->ctrlPoem->comment($author, $content, $idPoem);
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        
    }
    
    // Look for a param in an array
    private function getParam($array, $name) {
        if (isset($array[$name])) {
            return $array[$name];  
        } else {
            throw new Exception("Undefined '$name' parameter");
        }
    }
    
    // Display an error
    private function error($errorMessage) {
        $view = new View("Error");
        $view->generate(array("errorMessage" => $errorMessage));
    }
    
}
