<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free mobile app makes your decisions easily.">
    <meta name="keywords"
          content="decily, decide, easily, outfit, fashion, brand, new, look, stylization, moda, ciuchy, stylizacja, łatwiej, decyzja">
    <meta name="author" content="Mateusz Nowak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decily - Blog</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"/>
    <link type="text/css" rel="stylesheet" href="systemywebowe.css"/>
    <style type="text/css">
        #blog-container {
            background-image: url('images/desktoplifecycles-2x.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        [title="main-header"] {
            color: red;
        }

        :active {
            color: blue;
        }

        :target {
            color: red;
        }
    </style>
</head>
<body>

<div class="center-align">
    <h1 title="main-header">Decily App - Fashion Blog</h1>
    <h2 title="main-claim" class="style-inside-html">The app coming soon...</h2>
</div>


<nav class="center-align">
    <a href="index.php">MAIN PAGE</a> |
    <a href="partners.html">PARTNERS</a> |
    <a href="tests_signup.html">SIGN FOR BETA TESTS</a> |
    <a href="fashion_blog.php">FASHION BLOG</a>
</nav>



<?php
if(isset($_COOKIE['style-color']) && $_COOKIE['style-color']=='blue') {
    echo "<div style='background-color: blue'>";
} else{
    echo "<div style='background-color: red'>";
}
?>

<div id="blog-container" class="container">
    <?php
    session_start();


    if (isset($_SESSION['logged_username'])) {
        $logged_username = $_SESSION['logged_username'];

        echo "<div class=\"col s12 m7\">
        <div class=\"card horizontal article-card\">
            <div class=\"card-stacked article-content center-align\">" .
            "<h4>" . $logged_username . ", welcome to our blog!</h4>" .
            "<div class=\"card-action\">
                <form action='logout.php' id='logout-form'>
                 <button class=\"waves-effect waves-light btn\" type=\"submit\" form='logout-form'>Log out</button>
</form>
                  
                </div>
            </div>
        </div>
    </div>";

    } else {
        echo "

       <div class=\"col s12 m7\">
        <div class=\"card horizontal article-card\">
            <div class=\"card-stacked article-content\">
                <form action='service-login.php' method=\"post\" id='login-form'>
                    <div class=\"row\">
                        <div class=\"input-field col s4 left-align\">
                            <input id=\"registration_username\" type=\"text\" name=\"username\" maxlength=\"24\" required>
                            <label for=\"registration_username\">Username</label>
                        </div>
                        <div class=\"input-field col s4 right-align\">
                            <input id=\"registration_password\" type=\"password\" name=\"password\" required>
                            <label for=\"registration_password\">Password</label>
                        </div>
                        <button class=\"waves-effect waves-light btn\" type=\"submit\" form='login-form'>Log in</button>
                    </div>
                   </form>
                   <div class='row center-align'>";
        if (isset($_SESSION['last_login_error'])) {
            echo $_SESSION['last_login_error'];
        }

        echo "</div>
                <div class=\"card-action\">
                    <div class=\"col s12 center-align\">
                        <h5>Don't you have an account? <a class=\"modal-trigger\" href=\"#registration-modal\">Sign up!</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <div id=\"registration-modal\" class=\"modal\">
        <form action=\"view-registration.php\" method=\"post\">
            <div class=\"modal-content\">
                <h4>Decily Registration</h4>
                <div class=\"registration-form-content\">
                    <p>It's nice to meet you! Please introduce yourself better.</p>
                    <div class=\"row\">
                        <div class=\"input-field col s5 left-align\">
                            <input id=\"registration_username\" type=\"text\" name=\"username\" maxlength=\"24\" required>
                            <label for=\"registration_username\">Username</label>
                        </div>
                        <div class=\"input-field col s5 right-align\">
                            <input id=\"registration_email\" type=\"email\" class=\"validate\" name=\"email\"
                                   maxlength=\"255\"
                                   required>
                            <label for=\"registration_email\">E-mail address</label>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"input-field col s5 left-align\">
                            <input id=\"registration_password\" type=\"password\" name=\"password\" required>
                            <label for=\"registration_password\">Password</label>
                        </div>
                        <div class=\"input-field col s5 right-align\">
                            <input id=\"registration_repeat_password\" type=\"password\" name=\"password-repeated\" required>
                            <label for=\"registration_repeat_password\">Repeat password</label>
                        </div>
                    </div>
                    <div class=\"row\">
                        <div class=\"input-field col s6\">
                            <select id=\"registration_cloth_type\" name=\"cloth-type\">
                                <option value=\"MALE\" selected>MALE</option>
                                <option value=\"FEMALE\">FEMALE</option>
                                <option value=\"UNISEX\">UNISEX</option>
                            </select>
                            <label for=\"registration_cloth_type\">Which kind of clothes do you often wear?</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class=\"modal-footer\">
                <input id=\"registration_confirm\" type=\"submit\"
                       class=\"modal-action waves-effect waves-green btn-flat\"
                       value=\"REGISTER\">
                <a class=\"modal-action modal-close waves-effect waves-green btn-flat\">CANCEL</a>
            </div>

        </form>
    </div>";
    }
    ?>

    <?php
        require_once 'service-readallarticles.php'
    ?>

    <div class="row">
        <div class="col s12 center-align">
            <a href="#article-1">Article 1</a>
            <a href="#article-2">Article 2</a>
        </div>
    </div>
    <div class="col s12 m7">
        <div class="card horizontal article-card">
            <div class="card-image">
                <img src="https://lorempixel.com/200/880/nature/6" alt="Image placeholder.">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <article class="article-content">
                        <h2 id="article-1">Article #1</h2>
                        <section>
                            <h3>Section1</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis magna a risus
                                tincidunt vestibulum id id
                                massa. Duis sit amet malesuada risus. Curabitur sed lorem vitae elit mattis sagittis
                                quis sed nibh. Sed et
                                nisl quis mi dapibus bibendum blandit ac tellus. Aliquam ultricies faucibus consequat.
                                In scelerisque tellus
                                vel efficitur tincidunt. Mauris sodales, nisi et semper ornare, felis nunc mollis
                                mauris, semper ultricies
                                mi eros non velit. Fusce luctus at turpis at elementum. Mauris consequat est nisi, vel
                                auctor dui pharetra
                                mattis. Nam fringilla ante elementum finibus gravida. Curabitur eget arcu a libero
                                luctus posuere.</p>
                        </section>

                        <aside class="center-align">
                            <h4>WIN OUTFIT FOR YOU</h4>
                            <p>Check out our fashion quiz to win outfit!</p>
                        </aside>


                        <section>
                            <h3>Section2</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis magna a risus
                                tincidunt vestibulum id id
                                massa. Duis sit amet malesuada risus. Curabitur sed lorem vitae elit mattis sagittis
                                quis sed nibh. Sed et
                                nisl quis mi dapibus bibendum blandit ac tellus. Aliquam ultricies faucibus consequat.
                                In scelerisque tellus
                                vel efficitur tincidunt. Mauris sodales, nisi et semper ornare, felis nunc mollis
                                mauris, semper ultricies
                                mi eros non velit. Fusce luctus at turpis at elementum. Mauris consequat est nisi, vel
                                auctor dui pharetra
                                mattis. Nam fringilla ante elementum finibus gravida. Curabitur eget arcu a libero
                                luctus posuere.</p>
                        </section>
                    </article>
                </div>
                <div class="card-action">
                    <p>
                        <mark>73%</mark>
                        of users like this post
                    </p>
                    <meter value="0.73">73%</meter>
                </div>
            </div>
        </div>
    </div>


    <div class="col s12 m7">
        <div class="card horizontal article-card">
            <div class="card-image">
                <img src="https://lorempixel.com/200/880/nature/3" alt="Image placeholder.">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <article class="article-content">
                        <h2 id="article-2">Article #2</h2>

                        <section>
                            <h3>Section1</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis magna a risus
                                tincidunt vestibulum
                                id id
                                massa. Duis sit amet malesuada risus. Curabitur sed lorem vitae elit mattis sagittis
                                quis sed nibh. Sed
                                et
                                nisl quis mi dapibus bibendum blandit ac tellus. Aliquam ultricies faucibus consequat.
                                In scelerisque
                                tellus
                                vel efficitur tincidunt. Mauris sodales, nisi et semper ornare, felis nunc mollis
                                mauris, semper
                                ultricies
                                mi eros non velit. Fusce luctus at turpis at elementum. Mauris consequat est nisi, vel
                                auctor dui
                                pharetra
                                mattis. Nam fringilla ante elementum finibus gravida. Curabitur eget arcu a libero
                                luctus posuere.</p>
                        </section>


                        <section>
                            <h3>Section2</h3>
                            <p class="three-columns">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                                quis magna a risus
                                tincidunt vestibulum
                                id id
                                massa. Duis sit amet malesuada risus. Curabitur sed lorem vitae elit mattis sagittis
                                quis sed nibh. Sed
                                et
                                nisl quis mi dapibus bibendum blandit ac tellus. Aliquam ultricies faucibus consequat.
                                In scelerisque
                                tellus
                                vel efficitur tincidunt. Mauris sodales, nisi et semper ornare, felis nunc mollis
                                mauris, semper
                                ultricies
                                mi eros non velit. Fusce luctus at turpis at elementum. Mauris consequat est nisi, vel
                                auctor dui
                                pharetra
                                mattis. Nam fringilla ante elementum finibus gravida. Curabitur eget arcu a libero
                                luctus posuere.</p>
                        </section>
                    </article>
                </div>
                <div class="card-action">
                    <img id="fashion_image_absolute" src="images/fashion.png" alt="Fashion image."/>
                    <p>
                        <mark>11%</mark>
                        of users like this post
                    </p>
                    <meter value="0.11">11%</meter>
                </div>
            </div>
        </div>

    </div>

    <?php

    if (isset($_SESSION['logged_username'])) {
        echo "   
    <div class=\"fixed-action-btn\">
        <form id=\"create-article-action\" action=\"view-createarticle.php\" method=\"get\">
        <button class=\"btn-floating btn-large red\" form=\"create-article-action\">
            <i class=\"large material-icons\">mode_edit</i>
        </button>
        </form>
    </div>
    ";
    }
    ?>


    <footer>
        <details>
            <summary>Copyright 2017.</summary>
            <p> - by Decily. All Rights Reserved.</p>
            <p>All content and graphics on this web site are the property of the company Decily.</p>
        </details>

        <div>
                <form action='service-cookiestyle.php' method="post" id='blue-style-form'>
                    <input hidden name="style" type="text" value="blue" required>
                        <button class="waves-effect waves-light btn" style="background-color: blue" type="submit" form='blue-style-form'>BLUE BLOG STYLE</button>
                </form>
            <form action='service-cookiestyle.php' method="post" id='red-style-form'>
                <input hidden name="style" type="text" value="red" required>
                <button class="waves-effect waves-light btn" style="background-color: red" type="submit" form='red-style-form'>RED BLOG STYLE</button>
            </form>
        </div>
    </footer>
</div>
</div>
<script type="text/javascript" src="materialize/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="material-plugins.js"></script>
</body>
</html>