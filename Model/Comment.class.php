<?php

require_once "Model/Model.class.php";

class Comment extends Model {
    
    // return the list of comments from a specific poem
    public function getComments($idPoem) {
        
        $sql = 'SELECT COM_ID      as id,     ' . 
               '       COM_DATE    as date,   ' . 
               '       COM_AUTHOR  as author, ' . 
               '       COM_CONTENT as content ' . 
               'FROM T_COMMENT                ' . 
               'WHERE COM_ID = ? ';
        
        $comments = $this->executeQuery($sql, array($idPoem));
        
        return $comments;
    }
    
}
