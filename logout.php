<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 23:13
 */

session_start();

session_unset();

header('Location: fashion_blog.php');