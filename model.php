<?php

// return information of a specific poem
function getaPoem($idPoem) {
    $db = getDb();
              
    $poem = $db->prepare('SELECT POEM_ID      as id,     ' . 
                         '       POEM_TITLE   as title,  ' . 
                         '       POEM_CONTENT as content ' . 
                         'FROM T_POEM                    ' . 
                         'WHERE POEM_ID = ? ');
    
    $poem->execute(array($idPoem));
    
    if($poem->rowCount() == 1) {
        return $poem->fetch();  // return the first result 
    } else {
        throw new Exception("No poem correspond to the id '$idPoem'");
    }
}

// return the list of comments from a specific poem
function getComments($idPoem) {
    $db = getDb();
    
    $comments = $db->prepare('SELECT COM_ID      as id,     ' . 
                             '       COM_DATE    as date,   ' . 
                             '       COM_AUTHOR  as author, ' . 
                             '       COM_TITLE   as title,  ' . 
                             '       COM_CONTENT as content ' . 
                             'FROM T_COMMENT                ' . 
                             'WHERE COM_ID = ? ');
    
    $comments->execute(array($idPoem));
    
    return $comments;
}

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
              'gcaggia', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    return $db;
}