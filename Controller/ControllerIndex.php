<?php

require_once "Model/Poem.class.php";
require_once "View/View.class.php";

class ControllerIndex {
    
    // This attribut represents a model object 
    private $poem;
    
    public function __construct() {
        $this->poem = new Poem();
    }
    
    // Display all the poems of the website
    public function index() {
        $poems = $this->poem->getPoems();
        $view  = new View("Index");
        $view->generate(array('poems' => $poems));
    }
    
}
