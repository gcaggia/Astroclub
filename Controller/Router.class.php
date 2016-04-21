<?php

require_once "Controller/ControllerIndex.php";
require_once "Controller/ControllerArticle.php";
require_once "View/View.class.php";

class Router {
    
    private $ctrlIndex;
    private $ctrlArticle;
    
    public function __construct() {
        $this->ctrlIndex = new ControllerIndex();
        $this->ctrlArticle  = new ControllerArticle();
    }
    
    // Handle an incoming request
    public function queryRouter() {
        
        try {
    
            if(!isset($_GET['action'])) {
                $this->ctrlIndex->index();
                return;
            } 
            
            $action = $_GET['action'];
                
            if ($action != 'article' && $action != "comment") {
              throw new Exception("Invalid action.!");
            }
            
            //Specific article display
            if ($action == 'article') {
                
                $idArticle = intval($this->getParam($_GET, 'id'));
            
                if ($idArticle === 0) {
                    throw new Exception("Article ID not correct...");
                }
            
                // We call the controller
                $this->ctrlArticle->article($idArticle);
                
            } else {
                
                $author    = $this->getParam($_POST, 'author');
                $content   = $this->getParam($_POST, 'txt-comment');
                $idArticle = $this->getParam($_POST, 'id');
                
                $this->ctrlArticle->comment($author, $content, $idArticle);
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
