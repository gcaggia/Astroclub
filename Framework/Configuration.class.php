<?php

class Configuration {
    
    private static $parameters;

    // Return value of a param confing
    public static function get($name, $defaultValue = null) {
        
        if(isset(self::getParam()[$name])) {
            $value = self::getParam()[$name];
        } else {
            $value = $defaultValue;
        }
        
        return $value;
        
    }
    
    // Return Array of parameters and load it when needed
    private static function getParam() {
        
        if (self::$parameters == null) {
            
            $pathFile = getenv("CLEARDB_DATABASE_URL");
            
            // We are in Dev in local
            if($pathFile == "") {
                
                $pathFile = "Configuration/dev.ini";
                
                if(!file_exists($pathFile)) {
                    throw new Exception("Config Dev file not found");
                } else {
                    self::$parameters = parse_ini_file($pathFile);
                }
                
            // We are in prod on Heroku
            } else {
                
                $url = parse_url($pathFile);
                
                self::$parameters = array(
                    "hostname" => $url["host"],
                    "username" => $url["user"],
                    "password" => $url["pass"],
                    "database" => substr($url["path"], 1)
                );

            }

        } 
        
        return self::$parameters;
        
    }
    
    
}
