

<?php $title = "William Shakespeare Poems"; ?>

<?php ob_start(); ?>

<?php foreach ($poems as $poem): ?>
    <article>
        <header>
            <h1 class="titlePoem"><?= $poem['title'] ?></h1>
        </header>
        <p> <?php echo $poem['content'] ?> </p>
    </article>
    <hr />
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
