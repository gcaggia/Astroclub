<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $webRoot; ?>" >
    <link rel="stylesheet" href="content/style.css" />
    <title><?php echo $this->cleanValue($title); ?></title>
</head>

<body>
    <div id="global">
        <header>
            <a href="./"><h1 id="titlePage">Astroclub</h1></a>
            <p>News about astronomy, space mission and science.</p>
        </header>
        <div id="content">
            <!-- Content of the webpage -->
            <?php echo $content; ?> 
        </div>
        <!-- #content -->
        <footer id="footerPage">
            Website performed with PHP, HTML5 and CSS.
        </footer>
    </div>
    <!-- #global -->
</body>

</html>