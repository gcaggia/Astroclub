<?php $this->title = "Astroclub - " . $article['title']; ?>

<article>
    <header>
        <h1 class="titleArticle"><?php echo $article['title']; ?></h1>
    </header>
    <p> <?php echo $article['content'] ?> </p>
</article>
<hr>

<header>
    <h2 id="titleAnswers">
        Comments to <?php echo $article['title']; ?>
    </h2>
</header>

<?php foreach($comments as $comment): ?>
    <p><?php echo $comment['author']; ?></p>
    <p><?php echo $comment['content']; ?></p>
<?php endforeach; ?>

<form method="post" action="index.php?controller=article&action=comment">
    <input id="author" name="author" type="text" 
           placeholder="Your pseudo" required /> 
    <br>
    <textarea name="txt-comment" id="txt-comment" cols="30" rows="4"
              placeholder="Your Comment" required ></textarea>
    <br>
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>" 
           value="Comment"/>
    <input type="submit" value="Comment"/>
</form>
