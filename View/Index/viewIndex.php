
<?php $this->title = "Astroclub"; ?>

<?php foreach ($articles as $article): ?>
    <article>
        <header>
            <a href="<?php echo './article/' . 
                           $this->cleanValue($article['id']); ?>">
                <h1 class="titleArticle">
                    <?php echo $this->cleanValue($article['title']); ?>
                </h1>
            </a>
        </header>
        <p> <?php echo $this->cleanValue($article['content']); ?> </p>
    </article>
    <hr>
<?php endforeach; ?>
