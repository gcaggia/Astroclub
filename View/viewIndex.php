

<?php $title = "William Shakespeare Poems"; ?>

<?php ob_start(); ?>

<?php foreach ($poems as $poem): ?>
    <article>
        <header>
            <a href="<?php echo 'index.php?action=billet&id=' . $poem['id']; ?>">
                <h1 class="titlePoem"><?php echo $poem['title']; ?></h1>
            </a>
        </header>
        <p> <?php echo $poem['content']; ?> </p>
    </article>
    <hr>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
