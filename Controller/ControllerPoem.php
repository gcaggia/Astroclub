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
        $poems    = $this->poem->getaPoem($idPoem);
        $comments = $this->comment->getComments($idPoem);
        $view = new View("Poem");
        $view->generate(array('poem'     => $poem,
                              'comments' => $comments));
    }
    
}
