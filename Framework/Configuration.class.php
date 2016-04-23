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
            
            $pathFile = "Configuration/prod.ini";
            
            if(!file_exists($pathFile)) {
                $pathFile = "Configuration/dev.ini";
            }
            
            if(!file_exists($pathFile)) {
                throw new Exception("Config file not found");
            } else {
                self::$parameters = parse_ini_file($pathFile);
            }
            
        } 
        
        return self::$parameters;
        
    }
    
    
}
