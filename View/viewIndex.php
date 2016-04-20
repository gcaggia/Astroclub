
<?php $this->title = "William Shakespeare Poems"; ?>

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
