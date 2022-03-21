<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1>Articles</h1>
    <ul>
        <?php foreach ($articles as $article) : ?>
            <li><?= $article->title ?> - By <?= $article->author ?> <br> <?= $article->formatPublishDate() ?> <br> <a href="show.php?id=<?= $article->_GET['id'] ?>">Details</a></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>