<?php

require_once "Framework/Model.class.php";

class Article extends Model {
    
    // return the list of articles, sorted by id desc
    public function getArticles() {
                  
        $sql = 'SELECT ARTICLE_ID      as id,     ' . 
               '       ARTICLE_TITLE   as title,  ' . 
               '       ARTICLE_CONTENT as content ' . 
               'FROM T_ARTICLE                    ' . 
               'ORDER BY ARTICLE_ID desc ';
        
        $articles = $this->executeQuery($sql);
        
        return $articles;
    }
    
    // return information of a specific article
    public function getanArticle($idArticle) {
                  
        $sql = 'SELECT ARTICLE_ID      as id,     ' . 
               '       ARTICLE_TITLE   as title,  ' . 
               '       ARTICLE_CONTENT as content ' . 
               'FROM T_ARTICLE                    ' . 
               'WHERE ARTICLE_ID = ? ';
        
        $article = $this->executeQuery($sql, array($idArticle));
        
        if($article->rowCount() == 1) {
            return $article->fetch();  // return the first result 
        } else {
            throw new Exception("No poem correspond to the id '$idArticle'");
        }
    }    
    
}
