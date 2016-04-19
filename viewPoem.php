<?php $title = "William Shakespeare - " . $poem['title']; ?>

<?php ob_start() ?>

<article>
    <header>
        <h1 class="titlePoem"><?php echo $poem['title']; ?></h1>
    </header>
    <p> <?php echo $poem['content'] ?> </p>
</article>
<hr>

<header>
    <h2 id="titleAnswers">
        Comments to <?php echo $poem['title']; ?>
    </h2>
</header>

<?php foreach($comments as $comment): ?>
    <p><?php echo $comment['author']; ?></p>
    <p><?php echo $comment['content']; ?></p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>