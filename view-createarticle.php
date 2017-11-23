<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free mobile app makes your decisions easily.">
    <meta name="keywords"
          content="decily, decide, easily, outfit, fashion, brand, new, look, stylization, moda, ciuchy, stylizacja, łatwiej, decyzja">
    <meta name="author" content="Mateusz Nowak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decily - Registration result</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"/>
</head>
<body>
<div class="container center-align">
    <div class="row center-align">
        <div class="col s12 center-align">
            <div class="card">
                <div class="card-image">
                    <img src="images/DecilySmallerLogoHeader.png">
                    <span class="card-title"><b>CREATE NEW BLOG ARTICLE</b></span>
                </div>
                <div class="card-content">

                    <form id="create-article-form" action="service-addarticle.php" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="article_title" type="text" name="article_title" maxlength="255"
                                       required>
                                <label for="article-title">Title</label>
                            </div>
                            <div class="input-field col s12">
                                    <textarea id="article-content-textarea" class="materialize-textarea"
                                              form="create-article-form" maxlength="15000" name="article_content"
                                              required></textarea>
                                <label for="article-content-textarea">Content</label>
                            </div>
                        </div>
                        <?php
                        session_start();

                        if (!isset($_SESSION['logged_id'])) {
                            header('Location: fashion_blog.php');
                        }

                        if (isset($_SESSION['logged_admin']) && $_SESSION['logged_admin']) {
                            echo " <input type=\"checkbox\" id=\"published-checkbox\" name=\"article_published\"><label for=\"published-checkbox\">Publish article now</label>";
                        }
                        ?>
                    </form>
                </div>
                <div class="card-action">
                    <button form="create-article-form" class="waves-effect waves-light btn" type="submit">CONFIRM
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="materialize/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script>
    $('#article-content-textarea').trigger('autoresize');
</script>
</body>
</html>