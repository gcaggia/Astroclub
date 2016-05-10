<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <base href="<?php echo $webRoot; ?>" >
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        type="text/css" />
    <link rel="stylesheet" href="Content/style.css" />
    <title><?php echo $this->cleanValue($title); ?></title>
</head>

<body>
    <div id="global">
        <header>
            <div class="container">
                <a href="./"><h1 id="titlePage">Astroclub</h1></a>
                <p>News about astronomy, space mission and science.</p>
            </div>
        </header>
        <div id="content">
            <div class="container">
                <!-- Content of the webpage -->
                <?php echo $content; ?>
            </div> 
        </div>
        <!-- #content -->
        <footer  class="navbar" id="footerPage">
            <div class="container">
                <div class="pull-left">
                    <p><a href="#">Guillaume</a></p>
                </div>
                <div class="pull-right">
                    <p>Website performed with PHP, HTML5 and CSS.</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- #global -->
</body>

</html>