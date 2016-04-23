<?php

require "Configuration/Configuration.class.php";

/**
 * 
 * Abstract Class Model
 * Centralize access to the database
 * Use PHP PDO API 
 * 
 * @version 1.0
 * @author Guillaume Caggia
 */
abstract class Model {
    
    // PDO object to access to the database
    private static $db;
    
    // Execute an sql query with potential parameters
    protected function executeQuery($sql, $params = null) {
        if ($params == null) {
            $result = self::getDb()->query($sql);     // direct execution
        } else {
            $result = self::getDb()->prepare($sql);   // prepare query
            $result->execute($params);
        }
        
        return $result;
    }
    
    
    // connect to the database and return PDO object, initialize when needed
    private static function getDb() {
        
        if(self::$db == null) {
            
            // Retrieval configuration parameters about the DB
            $dsn   = Configuration::get("dsn");
            $login = Configuration::get("login");
            $pass  = Configuration::get("pass");
            
            self::$db = new PDO($dsn, $login, $pass, 
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return self::$db;
    }
    
}
