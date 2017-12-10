<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 23.11.2017
 * Time: 01:05
 */

require_once 'db-connection.php';

define("SUCCESS_NO_ARTICLES", "SUCCESS_NO_ARTICLES");
define("SUCCESS_ARTICLES_FOUND", "SUCCESS_ARTICLES_FOUND");

$all_articles_data = null;

load_all_published_articles($mysql_connection, $all_articles_data);

function load_all_published_articles(mysqli $mysql_connection, $all_articles_data)
{
    if ($all_articles_by_query = @$mysql_connection->query("SELECT * FROM articles WHERE published=1")) {
        if ($all_articles_by_query->num_rows == 0) {
            return constant("SUCCESS_NO_ARTICLES");
        }

        while ($article = $all_articles_by_query->fetch_assoc()) {


            echo "
    <div class=\"col s12 m7\">
        <div class=\"card horizontal article-card\">
         
            <div class=\"card-stacked\">
                <div class=\"card-content\">
                    <article class=\"article-content\">
                        <h2>" . $article['title'] . "</h2>
                        <section>
                           
                            <p>" . $article['content'] . "</p>
                        </section>
                    </article>
                </div>
                <div class=\"card-action\">
                </div>
            </div>
        </div>
    </div>
    ";

        }


    }
    $mysql_connection->close();

    return constant("SUCCESS_ARTICLES_FOUND");

}


