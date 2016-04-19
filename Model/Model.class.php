<?php

abstract class Model {
    
    // PDO object to access to the database
    private $db;
    
    // Execute an sql query with potential parameters
    protected function executeQuery($sql, $params = null) {
        if ($params == null) {
            $result = $this->getDb()->query($sql);     // direct execution
        } else {
            $result = $this->getDb()->prepare($sql);   // prepare query
            $result->execute($params);
        }
        
        return $result;
    }
    
    
    // connect to the database and return PDO object, initialize when needed
    private function getDb() {
        
        if($this->db == null) {
            $this->db = new PDO('mysql:host=localhost;dbname=shakespeare;charset=utf8', 
                  'gcaggia', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->db;
    }
    
}
