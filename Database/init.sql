-- CREATE DATABASE IF NOT EXISTS astroclub CHARACTER SET UTF8 COLLATE UTF8_GENERAL_CI;

DROP TABLE IF EXISTS T_COMMENT;
DROP TABLE IF EXISTS T_ARTICLE;

CREATE TABLE T_ARTICLE (
  ARTICLE_ID       INTEGER      PRIMARY KEY AUTO_INCREMENT,
  ARTICLE_DATE     DATETIME     NOT NULL,
  ARTICLE_IMG      VARCHAR(200),
  ARTICLE_TITLE    VARCHAR(100) NOT NULL,
  ARTICLE_CONTENT  TEXT         NOT NULL
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_COMMENT (
  COM_ID      INTEGER      PRIMARY KEY AUTO_INCREMENT,
  COM_DATE    DATETIME     NOT NULL,
  COM_AUTHOR  VARCHAR(100) NOT NULL,
  COM_CONTENT VARCHAR(200) NOT NULL,
  ARTICLE_ID  INTEGER      NOT NULL,
  constraint FK_COM_ARTICLE foreign key(ARTICLE_ID) 
             references T_ARTICLE(ARTICLE_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO T_ARTICLE(ARTICLE_TITLE, ARTICLE_DATE, 
                      ARTICLE_IMG, ARTICLE_CONTENT) 
  VALUES ("Curiosity",
          NOW(),
          "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Mars_Science_Laboratory_Curiosity_rover.jpg/640px-Mars_Science_Laboratory_Curiosity_rover.jpg",
          CONCAT("With its rover named Curiosity, Mars Science Laboratory" ,
                 "mission is part of NASA's Mars Exploration Program, ",
                 "a long-term effort of robotic exploration of the red planet. ",
                 "Curiosity was designed to assess whether Mars ever had an ",
                 "environment able to support small life forms called microbes. ",
                 "In other words, its mission is ",
                 "to determine the planet's habitability. (source : NASA)"));

INSERT INTO T_ARTICLE(ARTICLE_TITLE, ARTICLE_DATE, 
                      ARTICLE_IMG, ARTICLE_CONTENT) 
  VALUES ("Hubble",
          NOW(),
          "http://news.nationalgeographic.com/news/2009/09/photogalleries/new-hubble-camera-first-pictures/images/primary/090909-01-hubble-new-camera-upgraded_big.jpg",
          CONCAT("A dusty pillar lit from within by newborn stars ",
                 "is among the first cosmic beauties snapped by the Wide " ,
                 "Field Camera 3 (WFC3), a new instrument installed in May ",
                 "during the final servicing mission to refurbish ",
                 "the Hubble Space Telescope.  (source : national geographic)"));


INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, ARTICLE_ID) VALUES
(NOW(), 'Eric', 'I hope the mission will succeed !!', 1);
INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, ARTICLE_ID) VALUES
(NOW(), 'Me', 'I hope too !', 1);