<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 00:51
 */

require_once "db-connection.php";

define('ERROR_USERNAME_OR_EMAIL_IS_OCCUPIED', 'ERROR_USERNAME_OR_EMAIL_IS_OCCUPIED');
define('ERROR_PASSWORDS_INCORRECT', 'ERROR_PASSWORDS_INCORRECT');
define('SUCCESS_USER_REGISTERED', 'SUCCESS_USER_REGISTERED');


if (checkIfRegistrationRequestIsComplete()) {
    $registration_result = registerUser($mysql_connection);
    if ($registration_result == constant('SUCCESS_USER_REGISTERED')) {
        echo "<p>Registration successful! If you want to log in go to our fashion blog.</p>";
    } else if ($registration_result == constant('ERROR_PASSWORDS_INCORRECT')) {
        echo "
        <p>Registration error! Given passwords are not identical!</p>
        ";
    } else if ($registration_result == constant('ERROR_USERNAME_OR_EMAIL_IS_OCCUPIED')) {
        echo "
        <p>Registration error! Given username or email is occupied!</p>
        ";
    }
    $mysql_connection->close();
}

function calculateMd5Hash(string $stringToBeHashed){
    return md5($stringToBeHashed);
}

function checkIfRegistrationRequestIsComplete()
{
    return isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-repeated']) && isset($_POST['cloth-type']);
}

function registerUser(mysqli $mysql_connection)
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeated = $_POST['password-repeated'];
    $cloth_type = $_POST['cloth-type'];

    if (checkIfPasswordsAreEquals($password, $password_repeated)) {
        if (!checkIfUsernameIsOccupied($mysql_connection, $username) && !checkIfEmailIsOccupied($mysql_connection, $email)) {

            $hashed_password = calculateMd5Hash($password);

            $mysql_connection->
            query("INSERT INTO users (username, email, password, default_cloth_type) VALUES('$username','$email','$hashed_password','$cloth_type')");

            return constant('SUCCESS_USER_REGISTERED');
        } else {
            return constant('ERROR_USERNAME_OR_EMAIL_IS_OCCUPIED');;
        }
        return constant('ERROR_PASSWORDS_INCORRECT');;
    }
}

function checkIfEmailIsOccupied(mysqli $mysql_connection, $email_address)
{
    if ($user_by_query = @$mysql_connection->query("SELECT * FROM users WHERE email='$email_address'")) {
        return @$user_by_query->num_rows > 0;
    }
    return false;
}

function checkIfUsernameIsOccupied(mysqli $mysql_connection, $username)
{
    if ($user_by_query = @$mysql_connection->query("SELECT * FROM users WHERE username = '$username'")) {
        return @$user_by_query->num_rows > 0;
    }
    return false;
}

function checkIfPasswordsAreEquals($password, $repeated_password)
{
    return $password == $repeated_password;
}
