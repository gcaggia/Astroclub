<?php

require_once "Framework/Controller.class.php";
require_once "Framework/View.class.php";
require_once "Model/Article.class.php";

class ControllerIndex extends Controller {
    
    // This attribut represents a model object 
    private $article;
    
    public function __construct() {
        $this->article = new Article();
    }
    
    // Display all the articles of the website
    public function index() {
        $articles = $this->article->getArticles();
        $this->generateView(array('articles' => $articles));
    }
    
}
