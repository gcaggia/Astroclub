<?php

require_once "Framework/Controller.class.php";
require_once "Framework/View.class.php";
require_once "Model/Comment.class.php";
require_once "Model/Article.class.php";

class ControllerArticle extends Controller {
    
    // This attributs represents model objects
    private $article;
    private $comment;
    
    public function __construct() {
        $this->article = new Article();
        $this->comment = new Comment();
    }
    
    // Display details about a specific article
    public function index() {
        
        $idArticle = $this->request->getParam("id");
        
        $article  = $this->article->getanArticle($idArticle);
        $comments = $this->comment->getComments($idArticle);
        $view = new View("Article");
        $view->generate(array('article'  => $article,
                              'comments' => $comments));
    }
    
    // Add a comment to a article
    public function comment() {
        
        $author    = $this->request->getParam("author");
        $content   = $this->request->getParam("txt-comment");
        $idArticle = $this->request->getParam("id");
        
        // Save the comment
        $this->comment->addComment($author, $content, $idArticle);
        
        // Update of display
        $this->executeAction("index");
        
    }
    
}
