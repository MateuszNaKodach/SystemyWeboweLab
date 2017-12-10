<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 10.12.2017
 * Time: 10:36
 */

require_once 'db-properties.php';

$mysql_connection = new mysqli($db_host,$db_user,$db_password);

if ($mysql_connection->connect_errno!=0)
{
    echo "Error: ".$mysql_connection->connect_errno;
    die();
}

$mysql_connection->
query("DROP DATABASE ".$db_name);

echo " Baza danych została usunięta!";
