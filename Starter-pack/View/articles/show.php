<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <h1><?= $article->title ?></h1>
    <p><?= $article->formatPublishDate() ?> - By <?= $article->author ?></p>
    <p><?= $article->description ?></p>

    <img src="<?= $article->getImageUrl() ?>" alt="Article image" height="600" width="800">

    <br><br>

    <a href="index.php?page=show-article&title=<?= $prevArticle->title ?? $article->title ?>">Previous article</a>
    <a href="index.php?page=show-article&title=<?= $nextArticle->title ?? $article->title ?>">Next article</a>
</section>

<br>

<?php require 'View/includes/footer.php'?>