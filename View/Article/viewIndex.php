<?php $this->title = "Astroclub - " . $article['title']; ?>

<article>
    <header>
        <h1 class="titleArticle">
            <?php echo $this->cleanValue($article['title']); ?>
        </h1>
    </header>
    <p> <?php echo $this->cleanValue($article['content']) ?> </p>
</article>
<hr>

<header>
    <h2 id="titleAnswers">
        Comments to <?php echo $this->cleanValue($article['title']); ?>
    </h2>
</header>

<?php foreach($comments as $comment): ?>
    <p><?php echo $this->cleanValue($comment['author']); ?></p>
    <p><?php echo $this->cleanValue($comment['content']); ?></p>
<?php endforeach; ?>

<form method="post" action="./article/comment">
    <input id="author" name="author" type="text" 
           placeholder="Your pseudo" required /> 
    <br>
    <textarea name="txt-comment" id="txt-comment" cols="30" rows="4"
              placeholder="Your Comment" required ></textarea>
    <br>
    <input type="hidden" name="id" value="Comment"
           value="<?php echo $this->cleanValue($article['id']); ?>" />
    <input type="submit" value="Comment"/>
</form>
