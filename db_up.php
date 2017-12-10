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
query("CREATE DATABASE IF NOT EXISTS ".$db_name);

$mysql_connection->close();

$mysql_connection = new mysqli($db_host,$db_user,$db_password, $db_name);
$mysql_connection->query(
    "
    SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";
    "
);

$mysql_connection->
query("CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(24) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `default_cloth_type` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `registration_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;");

$mysql_connection->
query("CREATE TABLE `articles` (
  `id` bigint(20) NOT NULL,
  `author_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `content` varchar(15000) COLLATE utf8_polish_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;");


$mysql_connection->query(
  "INSERT INTO `articles` (`id`, `author_id`, `title`, `content`, `created_date`, `published`, `deleted`) VALUES
(1, 7, 'Testowy artykuÅ‚', 'Content lalaalslda SRATAÅDAÅšÅÃ“KDOKAPSOASD ', '2017-11-23 01:36:36', 0, 0),
(2, 7, 'adasd', 'asdasdasd ', '2017-11-23 01:36:36', 0, 0),
(3, 7, 'asdasd', 'asdasasd ', '2017-11-23 01:36:36', 1, 0),
(4, 7, 'Nowy artykuÅ‚', 'Lalalal treÅ›Ä‡  ', '2017-11-23 02:10:02', 1, 0),
(5, 7, 'Nowy tytuÅ‚', 'Nowy post lalalaNowy post lalala\r\nNowy post lalala\r\nNowy post lalalaNowy post lalala\r\nNowy post lalala\r\nNowy post lalalaNowy post lalalaNowy post lalalaNowy post lalalaNowy post lalala\r\nNowy post lalala ', '2017-11-24 14:12:52', 1, 0),
(6, 7, 'ASdasdas', 'qwdasdasd ', '2017-11-25 11:58:40', 1, 0),
(7, 7, 'test', 'test ', '2017-11-26 15:44:29', 1, 0),
(8, 7, 'test2', 'test3 ', '2017-11-26 15:46:52', 0, 0),
(9, 7, 'Nowy post', 'nowa  ', '2017-12-10 09:57:59', 1, 0);"
);

$mysql_connection->query(
    "
    INSERT INTO `users` (`id`, `username`, `email`, `password`, `default_cloth_type`, `registration_date`, `deleted`, `is_admin`) VALUES
(6, 'abc', 'abc@abc.com', '900150983cd24fb0d6963f7d28e17f72', 'MALE', '2017-11-22 16:26:41', 0, 0),
(7, 'test', 'test@test.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'MALE', '2017-11-22 22:50:36', 0, 1),
(8, 'ania', 'ania@test.com', '360629a6e60ac91f549aa92aa24c4aab', 'FEMALE', '2017-11-24 14:11:16', 0, 0),
(9, 'testowy_kowalski', 'kowalski@koval.com', '098f6bcd4621d373cade4e832627b4f6', 'MALE', '2017-12-10 10:30:56', 0, 0);
    "
);

$mysql_connection->query(
    "
    ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `articles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;
    "
);
$mysql_connection->close();

echo " Baza danych została stworzona!!";
