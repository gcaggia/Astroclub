<?php

class Request {
    
    // Parameters of the incoming query
    private $parameters;
    
    public function __construct($parameters) {
        $this->parameters = $parameters;
    }
    
    // Return true if the param exists in the query
    public function ParamExist($name) {
        return (isset($this->parameters[$name]) 
                && $this->parameters[$name] != "");
    }
    
    // Return the value of the param asked
    // Rise an exception  if the param does not exist
    public function getParam($name) {
        if($this->ParamExist($name)) {
            return $this->parameters[$name];
        } else {
            throw new Exception("'$name' parameter does not exist in the query");
        }
    }
    
}
