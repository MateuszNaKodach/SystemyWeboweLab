<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 15:02
 */

require_once "db-connection.php";
define('ERROR_USERNAME_OR_PASSWORD_INCORRECT', 'ERROR_USERNAME_OR_PASSWORD_INCORRECT');
define('SUCCESS_USER_LOG_IN', 'SUCCESS_USER_LOG_IN');

session_start();

loginUser($mysql_connection);

$mysql_connection->close();


function loginUser(mysqli $mysql_connection)
{

    if (checkIfLoginRequestIsComplete()) {

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if ($found_user = checkIfPasswordIsCorrectForUser($mysql_connection, $username, $password)) {
            $found_user_data = $found_user->fetch_assoc();

            $_SESSION['logged_id'] = $found_user_data['id'];
            $_SESSION['logged_username'] = $found_user_data['username'];
            $_SESSION['logged_email'] = $found_user_data['default_cloth_type'];
            $_SESSION['logged_cloth_type'] = $found_user_data['default_cloth_type'];
            $_SESSION['logged_admin'] = $found_user_data['is_admin'];

            $found_user->free_result();
            unset($_SESSION['last_login_error']);
        } else {
            $_SESSION['last_login_error'] = "<span style='color: red'>Incorrect username or password.</span>";
        }
        header('Location: fashion_blog.php');

        $found_user->close();
    }
}


function checkIfLoginRequestIsComplete()
{
    return isset($_POST['username']) && isset($_POST['password']);
}


function checkIfPasswordIsCorrectForUser(mysqli $mysql_connection, string $username, string $password)
{
    if ($found_user = $mysql_connection->query("SELECT * FROM users WHERE username='$username' AND password='$password'")) {
        if ($found_user->num_rows > 0) {
            return $found_user;
        }
    }
    return false;

}
