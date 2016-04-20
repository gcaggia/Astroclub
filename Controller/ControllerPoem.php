<?php

require_once "Model/Poem.class.php";
require_once "Model/Comment.class.php";
require_once "View/View.class.php";

class ControllerPoem {
    
    // This attributs represents model objects
    private $poem;
    private $comment;
    
    public function __construct() {
        $this->poem    = new Poem();
        $this->comment = new Comment();
    }
    
    // Display details about a specific poem
    public function poem($idPoem) {
        $poem     = $this->poem->getaPoem($idPoem);
        $comments = $this->comment->getComments($idPoem);
        $view = new View("Poem");
        $view->generate(array('poem'     => $poem,
                              'comments' => $comments));
    }
    
    // Add a comment to a poem
    public function comment($author, $content, $idPoem) {
        
        // Save the comment
        $this->comment->addComment($author, $content, $idPoem);
        
        // Update of display
        $this->poem($idPoem);
        
    }
    
}
