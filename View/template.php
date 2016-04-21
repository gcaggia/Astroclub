<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo $title; ?></title>
</head>

<body>
    <div id="global">
        <header>
            <a href="index.php"><h1 id="titlePage">Astroclub</h1></a>
            <p>News about astronomy, space mission and science.</p>
        </header>
        <div id="content">
            <?php echo $content; ?> <!-- Content of the webpage -->
        </div>
        <!-- #content -->
        <footer id="footerPage">
            Website performed with PHP, HTML5 and CSS.
        </footer>
    </div>
    <!-- #global -->
</body>

</html>