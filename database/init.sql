DROP TABLE IF EXISTS T_COMMENT;
DROP TABLE IF EXISTS T_POEM;

CREATE TABLE T_POEM (
  POEM_ID       INTEGER      PRIMARY KEY AUTO_INCREMENT,
  POEM_IMG      VARCHAR(100),
  POEM_TITLE    VARCHAR(100) NOT NULL,
  POEM_CONTENT  VARCHAR(400) NOT NULL
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE T_COMMENT (
  COM_ID      INTEGER      PRIMARY KEY AUTO_INCREMENT,
  COM_DATE    DATETIME     NOT NULL,
  COM_AUTHOR  VARCHAR(100) NOT NULL,
  COM_CONTENT VARCHAR(200) NOT NULL,
  POEM_ID     INTEGER      NOT NULL,
  constraint FK_COM_POEM foreign key(POEM_ID) references T_POEM(POEM_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO T_POEM(POEM_TITLE, POEM_CONTENT) values 
("Sonnet 18", "Shall I compare thee to a summer’s day?
Thou art more lovely and more temperate:
Rough winds do shake the darling buds of May,
And summer’s lease hath all too short a date:
Sometime too hot the eye of heaven shines,
And often is his gold complexion dimm’d;
And every fair from fair sometime declines,
By chance, or nature’s changing course, untrimm’d:
But thy eternal summer shall not fade,
Nor lose possession of that fair thou ow’st;
Nor shall Death brag thou wander’st in his shade,
When in eternal lines to time thou grow’st:
So long as men can breathe, or eyes can see,
So long lives this, and this gives life to thee.");

INSERT INTO T_POEM(POEM_TITLE, POEM_CONTENT) values 
("Sonnet 29", "When, in disgrace with fortune and men's eyes,
I all alone beweep my outcast state,
And trouble deaf heaven with my bootless cries,
And look upon myself, and curse my fate,
Wishing me like to one more rich in hope,
Featured like him, like him with friends possessed,
Desiring this man's art and that man's scope,
With what I most enjoy contented least;
Yet in these thoughts myself almost despising,
Haply I think on thee—and then my state,
Like to the lark at break of day arising
From sullen earth, sings hymns at heaven's gate;
For thy sweet love rememb'red such wealth brings
That then I scorn to change my state with kings.");


INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POEM_ID) VALUES
(NOW(), 'Eric', 'It is beautiful !!', 1);
INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POEM_ID) VALUES
(NOW(), 'Me', 'You are right.', 1);