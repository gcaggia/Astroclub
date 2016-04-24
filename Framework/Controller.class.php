<?php

require_once "Framework/Request.class.php";
require_once "Framework/View.class.php";

abstract class Controller {
    
    // Action to do
    private $action;
    
    //Incoming Request
    protected $request;
    
    // Define incoming request
    public function setRequest(Request $request) {
        $this->request = $request;
    }
    
    // Execute action to do
    public function executeAction($action) {
        
        if(method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        } else {
            $controllerClass = get_class($this);
            throw new Exception("Action '$action' undefined 
                inside $controllerClass class");
        }
    }
    
    // Abstract method corresponding to default action
    // Force sub class to implemente it
    public abstract function index();
    
    //Generate View associate to current Controller
    protected function generateView($viewData = array()) {
        
        // Determine name of the view file from name of current controller
        $controllerClass = get_class($this);
        $controllerName  = str_replace("Controller", "", $controllerClass);
        
        // Instanciation and generation of the view
        $view = new View($this->action, $controllerName);
        $view->generate($viewData);
        
    }
    
}
