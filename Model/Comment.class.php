<?php

require_once "Model/Model.class.php";

class Comment extends Model {
    
    // Return the list of comments from a specific poem
    public function getComments($idPoem) {
        
        $sql = 'SELECT COM_ID      as id,     ' . 
               '       COM_DATE    as date,   ' . 
               '       COM_AUTHOR  as author, ' . 
               '       COM_CONTENT as content ' . 
               'FROM T_COMMENT                ' . 
               'WHERE ARTICLE_ID = ? ';
        
        $comments = $this->executeQuery($sql, array($idPoem));
        
        return $comments;
    }
    
    // Add a comment to the database
    public function addComment($author, $content, $idPoem) {
        
        $sql = 'INSERT INTO T_COMMENT( COM_DATE, COM_AUTHOR,     ' .
               '                       COM_CONTENT, ARTICLE_ID ) ' .
               'VALUES (?, ?, ?, ?) ';
        
        $dt = date(DATE_W3C); // Get current date
        
        $this->executeQuery($sql, array($dt, $author, 
                                        $content, $idPoem));
        
    }
    
}
