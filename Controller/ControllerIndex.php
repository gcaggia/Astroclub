<?php

require_once "Model/Article.class.php";
require_once "Framework/View.class.php";

class ControllerIndex {
    
    // This attribut represents a model object 
    private $article;
    
    public function __construct() {
        $this->article = new Article();
    }
    
    // Display all the articles of the website
    public function index() {
        $articles = $this->article->getArticles();
        $view  = new View("Index");
        $view->generate(array('articles' => $articles));
    }
    
}
