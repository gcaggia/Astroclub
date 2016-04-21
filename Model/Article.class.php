<?php

require_once "Model/Model.class.php";

class Poem extends Model {
    
    // return the list of poems, sorted by id desc
    public function getPoems() {
                  
        $sql = 'SELECT POEM_ID      as id,     ' . 
               '       POEM_TITLE   as title,  ' . 
               '       POEM_CONTENT as content ' . 
               'FROM T_POEM                    ' . 
               'ORDER BY POEM_ID desc ';
        
        $poems = $this->executeQuery($sql);
        
        return $poems;
    }
    
    // return information of a specific poem
    public function getaPoem($idPoem) {
                  
        $sql = 'SELECT POEM_ID      as id,     ' . 
               '       POEM_TITLE   as title,  ' . 
               '       POEM_CONTENT as content ' . 
               'FROM T_POEM                    ' . 
               'WHERE POEM_ID = ? ';
        
        $poem = $this->executeQuery($sql, array($idPoem));
        
        if($poem->rowCount() == 1) {
            return $poem->fetch();  // return the first result 
        } else {
            throw new Exception("No poem correspond to the id '$idPoem'");
        }
    }    
    
}
