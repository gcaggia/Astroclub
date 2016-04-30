<?php

class View {
    
    // Name of the file linked to the view
    private $file;
    // Title of the view (defined inside the view file)
    private $title;
    
    public function __construct($action, $controller = "") {
        
        // Setting of the file name from action and constructor
        $file = "View/";
        
        if($controller != "") {
            $file = $file . $controller . "/";
        }
        
        $this->file = $file . "view" . $action . ".php";
    }
    
    // Clean a value inserted in a html page
    // Prevention against SQL injection and XSS 
    private function cleanValue($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }
    
    // Generate and display a view
    public function generate($data) {
        
        // Generate the specific part of the view
        $content = $this->generateFile($this->file, $data);
        
        // Because of url rewriting we need a variable to define 
        // the path root  of the website
        $webRoot = Configuration::get("webRoot", "/");
        
        // Generate the commum template using the specific part
        $view = $this->generateFile("View/template.php", 
                                    array("title"   => $this->title, 
                                          "content" => $content, 
                                          "webRoot" => $webRoot));
        
        // Return the view to the browser
        echo $view;
    }
    
    // Generate a view file and return result
    private function generateFile($file, $data) {
        
        if (file_exists($file)) {
            
            // Render $data array's elements accessible to the view
            extract($data);
            
            // Turn on output buffering
            ob_start();
            
            // Include the view, the result is displayed inside the buffer
            require $file;
            
            // Stop output buffering and return result
            return ob_get_clean();
            
        } else {
            throw new Exception("File '$file' not found");
        }
        
    }

}
