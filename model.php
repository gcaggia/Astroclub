<?php


function getPoems() {
    $db = new PDO('mysql:host=localhost;dbname=shakespeare;charset=utf8', 
              'gcaggia', '');
              
    $poems = $db->query('SELECT POEM_ID      as id,     ' . 
                        '       POEM_TITLE   as title,  ' . 
                        '       POEM_CONTENT as content ' . 
                        'FROM T_POEM                    ' . 
                        'ORDER BY POEM_ID desc');
    
    return $poems;
}