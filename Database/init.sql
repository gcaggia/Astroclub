DROP TABLE IF EXISTS T_COMMENT;
DROP TABLE IF EXISTS T_POEM;

CREATE TABLE T_POEM (
  POEM_ID       INTEGER      PRIMARY KEY AUTO_INCREMENT,
  POEM_IMG      VARCHAR(100),
  POEM_TITLE    VARCHAR(100) NOT NULL,
  POEM_CONTENT  TEXT         NOT NULL
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_COMMENT (
  COM_ID      INTEGER      PRIMARY KEY AUTO_INCREMENT,
  COM_DATE    DATETIME     NOT NULL,
  COM_AUTHOR  VARCHAR(100) NOT NULL,
  COM_CONTENT VARCHAR(200) NOT NULL,
  POEM_ID     INTEGER      NOT NULL,
  constraint FK_COM_POEM foreign key(POEM_ID) references T_POEM(POEM_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO T_POEM(POEM_TITLE, POEM_CONTENT) 
  VALUES ("Sonnet 18", 
          CONCAT("Shall I compare thee to a summer’s day? <br>"      ,      
          "Thou art more lovely and more temperate:  <br>"           ,           
          "Rough winds do shake the darling buds of May,  <br>"      ,      
          "And summer’s lease hath all too short a date:  <br>"      ,      
          "Sometime too hot the eye of heaven shines,  <br>"         ,         
          "And often is his gold complexion dimm’d;  <br>"           ,           
          "And every fair from fair sometime declines,  <br>"        ,        
          "By chance, or nature’s changing course, untrimm’d:  <br>" , 
          "But thy eternal summer shall not fade,  <br>"             ,             
          "Nor lose possession of that fair thou ow’st;  <br>"       ,       
          "Nor shall Death brag thou wander’st in his shade,  <br>"  ,  
          "When in eternal lines to time thou grow’st:  <br>"        ,        
          "So long as men can breathe, or eyes can see,  <br>"       ,             
          "So long lives this, and this gives life to thee.<br>"));

INSERT INTO T_POEM(POEM_TITLE, POEM_CONTENT) 
  VALUES ("Sonnet 29", 
          CONCAT("When, in disgrace with fortune and men's eyes, <br>"      ,
                 "I all alone beweep my outcast state, <br>"                ,
                 "And trouble deaf heaven with my bootless cries, <br>"     ,
                 "And look upon myself, and curse my fate, <br>"            ,
                 "Wishing me like to one more rich in hope, <br>"           ,
                 "Featured like him, like him with friends possessed, <br>" ,
                 "Desiring this man's art and that man's scope, <br>"       ,
                 "With what I most enjoy contented least; <br>"             ,
                 "Yet in these thoughts myself almost despising, <br>"      ,
                 "Haply I think on thee—and then my state, <br>"            ,
                 "Like to the lark at break of day arising <br>"            ,
                 "From sullen earth, sings hymns at heaven's gate; <br>"    ,
                 "For thy sweet love rememb'red such wealth brings <br>"    ,
                 "That then I scorn to change my state with kings. <br>"));


INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POEM_ID) VALUES
(NOW(), 'Eric', 'It is beautiful !!', 1);
INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POEM_ID) VALUES
(NOW(), 'Me', 'You are right.', 1);