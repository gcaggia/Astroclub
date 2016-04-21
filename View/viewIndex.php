
<?php $this->title = "William Shakespeare Articles"; ?>

<?php foreach ($articles as $article): ?>
    <article>
        <header>
            <a href="<?php echo 'index.php?action=article&id=' . 
                                 $article['id']; ?>">
                <h1 class="titleArticle"><?php echo $article['title']; ?></h1>
            </a>
        </header>
        <p> <?php echo $article['content']; ?> </p>
    </article>
    <hr>
<?php endforeach; ?>
