<?php

require_once "Framework/Request.class.php";
require_once "Framework/View.class.php";

class Router {
    
    
    // Handle an incoming request
    public function queryRouter() {
        
        try {
            
            $request = new Request($_REQUEST);
            
            $controller = $this->createController($request);
            $action = $this->createAction($request);
            
            $controller->executeAction($action);

        } catch (Exception $e) {
            $this->handleError($e);
        }
        
    }
    
    // Create the good controller from an incoming request
    private function createController(Request $request) {
        
        $strController = "Index";  // Default Controller
        
        if($request->ParamExist('controller')) {
            $strController = $request->getParam('controller');
            
            // The first letter must be capitalized
            $strController = ucfirst(strtolower($strController));
        }
        
        // Name of the class of the controller
        $controllerClass = "Controller" . $strController;
        
        $controllerFile = "Controller/"  . $controllerClass . ".php";
        
        if(file_exists($controllerFile)) {
            
            // We include the good controller file in order to instance it after
            require $controllerFile;
            $controller = new $controllerClass();
            
            $controller->setRequest($request);
            return $controller;
            
        } else {
            throw new Exception("File '$controllerFile' not found");;
        }
        
        
    }
    
    // Determine action to execute from incoming request
    private function createAction(Request $request) {
        
        $action = "index";  // Default action
        
        if($request->ParamExist('action')) {
            $action = $request->getParam('action');
        }
        
        return $action;
        
    }
    
    
    // Handle an execution error (exception)
    private function error(Exception $exception) {
        $view = new View("Error");
        $view->generate(array("errorMessage" => $exception->getMessage() ));
    }
    
}
