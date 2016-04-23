<?php

require_once "Model/Article.class.php";
require_once "Model/Comment.class.php";
require_once "Framework/View.class.php";

class ControllerArticle {
    
    // This attributs represents model objects
    private $article;
    private $comment;
    
    public function __construct() {
        $this->article = new Article();
        $this->comment = new Comment();
    }
    
    // Display details about a specific article
    public function article($idArticle) {
        $article  = $this->article->getanArticle($idArticle);
        $comments = $this->comment->getComments($idArticle);
        $view = new View("Article");
        $view->generate(array('article'  => $article,
                              'comments' => $comments));
    }
    
    // Add a comment to a article
    public function comment($author, $content, $idArticle) {
        
        // Save the comment
        $this->comment->addComment($author, $content, $idArticle);
        
        // Update of display
        $this->article($idArticle);
        
    }
    
}
