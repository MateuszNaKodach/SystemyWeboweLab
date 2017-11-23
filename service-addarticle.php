<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 00:51
 */

session_start();

if (!isset($_SESSION['logged_id'])) {
    header('Location: fashion_blog.php');
}

require_once "db-connection.php";


if (checkIfAddArticleRequestIsComplete()) {
    addArticle($mysql_connection);
    $mysql_connection->close();

    echo "<p>You article was added!</p>";
}else{
    echo "<p>You need to fill all article fields!</p>";
}

header('Location: fashion_blog.php');

function checkIfAddArticleRequestIsComplete()
{
    return !isNullOrEmptyString($_POST['article_title']) && !isNullOrEmptyString($_POST['article_content']) && !isNullOrEmptyString($_POST['article_published']);
}

function isNullOrEmptyString($question)
{
    return (!isset($question) || trim($question) === '');
}

function addArticle(mysqli $mysql_connection)
{
    $article_author_id = $_SESSION['logged_id'];
    $article_title = $_POST['article_title'];
    $article_content = $_POST['article_content'];
    $article_published = $_POST['article_published']=='on' ? 1 : 0;

    $mysql_connection->
    query("INSERT INTO articles(author_id, title, content, published) VALUES ('$article_author_id','$article_title', '$article_content ', '$article_published')");

}

