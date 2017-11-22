<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 14:05
 */

require_once 'db-properties.php';

$mysql_connection = new mysqli($db_host,$db_user,$db_password,$db_name);

if ($mysql_connection->connect_errno!=0)
{
    echo "Error: ".$mysql_connection->connect_errno;
    die();
}