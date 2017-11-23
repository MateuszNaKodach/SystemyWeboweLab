<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 23.11.2017
 * Time: 01:44
 */

if (isset($_POST['style'])) {
    echo $_POST['style'];
    if (isset($_COOKIE['style-color'])) {
        unset($_COOKIE['style-color']);
    }
    setcookie('style-color', $_POST['style'], time() + 3600);
}


header('Location: fashion_blog.php');