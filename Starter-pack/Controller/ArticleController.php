<?php

declare(strict_types=1);

class ArticleController
{
    private function makeDbConnection()
    {
        // prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        require_once 'config.php';
        require_once 'DatabaseManager.php';

        $dbManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
        $dbManager->connect();

        return $dbManager;
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $dbManager = $this->makeDbConnection();

        // fetch all articles as $rawArticles (as a simple array)
        $statement = $dbManager->connection->prepare('SELECT * FROM articles');
        $statement->execute();

        $rawArticles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article(
                $rawArticle['title'],
                $rawArticle['description'],
                $rawArticle['publish_date'],
                $rawArticle['author'],
                $rawArticle['image_url']
            );
        }

        return $articles;
    }

    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    public function show(string $title)
    {
        // this can be used for a detail page
        $dbManager = $this->makeDbConnection();

        $statement = $dbManager->connection->prepare('SELECT * FROM articles WHERE title=:title');
        $statement->bindparam(':title', $title, PDO::PARAM_STR);
        $statement->execute();

        $rawArticle = $statement->fetch(PDO::FETCH_OBJ);

        $article = new Article(
            $rawArticle->title,
            $rawArticle->description,
            $rawArticle->publish_date,
            $rawArticle->author,
            $rawArticle->image_url
        );

        $articleId = $rawArticle->id;
        $prevArticleId = $rawArticle->id - 1;
        $nextArticleId = $rawArticle->id + 1;

        // get next article title
        $nextArticle = $this->getAnotherArticle($nextArticleId, $dbManager);

        // get previous article title
        $prevArticle = $this->getAnotherArticle($prevArticleId, $dbManager);

        require 'View/articles/show.php';
    }

    private function getAnotherArticle(int $id, DatabaseManager $dbManager) {
        $anotherArticleTitleQuery = 'SELECT title FROM articles WHERE id = :id';
        $stmtAnotherArticle = $dbManager->connection->prepare($anotherArticleTitleQuery);
        $stmtAnotherArticle->bindparam(':id', $id, PDO::PARAM_INT);
        $stmtAnotherArticle->execute();
        return $stmtAnotherArticle->fetch(PDO::FETCH_OBJ);
    }
}