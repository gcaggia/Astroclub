<?php

// return the list of poems, sorted by id desc
function getPoems() {
    $db = getDb();
              
    $poems = $db->query('SELECT POEM_ID      as id,     ' . 
                        '       POEM_TITLE   as title,  ' . 
                        '       POEM_CONTENT as content ' . 
                        'FROM T_POEM                    ' . 
                        'ORDER BY POEM_ID desc');
    
    return $poems;
}

// connect to the database and return PDO object
function getDb() {
    $db = new PDO('mysql:host=localhost;dbname=shakespeare;charset=utf8', 
              'gcaggia', '');
    
    return $db;
}