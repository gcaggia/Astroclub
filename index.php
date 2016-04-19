<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title>William Shakespeare Poems</title>
</head>

<body>
<div id="global">
    <header>
        <a href="index.php"><h1 id="titleBlog">William Shakespeare Poems</h1></a>
        <p>"This is a select list of the best famous William Shakespeare poetry"</p>
    </header>
    <div id="content">
        <?php $db = new PDO('mysql:host=localhost;dbname=shakespeare;charset=utf8', 
                            'gcaggia', ''); 
        $poems = $db->query('SELECT POEM_ID      as id,     ' . 
                            '       POEM_TITLE   as title,  ' . 
                            '       POEM_CONTENT as content ' . 
                            'FROM T_POEM                    ' . 
                            'ORDER BY POEM_ID desc'); 
        foreach ($poems as $poem): ?>
            <article>
                <header>
                    <h1 class="titlePoem"><?= $poem['title'] ?></h1>
                </header>
                <p> <?php echo $poem['content'] ?> </p>
            </article>
            <hr />
        <?php endforeach; ?>
    </div>
    <!-- #content -->
    <footer id="footer">
        Blog performed with PHP, HTML5 and CSS.
    </footer>
</div>
<!-- #global -->
</body>

</html>