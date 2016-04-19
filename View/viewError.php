

<?php $title = "William Shakespeare Poems"; ?>

<?php ob_start(); ?>

<p>An error has occured : <?php echo $errorMessage; ?></p>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
