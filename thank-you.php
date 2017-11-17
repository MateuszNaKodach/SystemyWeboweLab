<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free mobile app makes your decisions easily.">
    <meta name="keywords"
          content="decily, decide, easily, outfit, fashion, brand, new, look, stylization, moda, ciuchy, stylizacja, łatwiej, decyzja">
    <meta name="author" content="Mateusz Nowak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decily - Thank You</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"/>
    <link type="text/css" rel="stylesheet" href="systemywebowe.css"/>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 17.11.2017
 * Time: 17:54
 */

define("MIN_NAME_LENGTH", 3, true);
define("MAX_NAME_LENGTH", 10, false);
define("MAX_MESSAGE_LENGTH", 500);

$errors[0] = 'INVALID_LENGTH';
$errors[1] = 'INVALID_PHONE_FORMAT';
$errors[2] = 'INVALID_MAIL_FORMAT';
$errors[] = 'INVALID_MONTH';

$genders = array('male', 'female');


assign_identifier_to_variable_if_exists('first_name', $first_name);
assign_identifier_to_variable_if_exists('last_name', $last_name);
assign_identifier_to_variable_if_exists('email', $email_address );
assign_identifier_to_variable_if_exists('phone', $phone_number);
assign_identifier_to_variable_if_exists('birth_month', $month_of_birth);
assign_identifier_to_variable_if_exists('message_content', $message);
assign_identifier_to_variable_if_exists('gender', $gender);
assign_identifier_to_variable_if_exists('check_buy_online', $buy_online);
assign_identifier_to_variable_if_exists('check_need_advice',$need_advice);

echo $first_name;
echo $need_advice;


function check_if_exists_in_post_body($identifier)
{
    return array_key_exists($identifier, $_POST);
}

function assign_identifier_to_variable_if_exists($identifier, &$variable)
{
    if (check_if_exists_in_post_body($identifier)) {
        $variable = $_POST[$identifier];
    }
}

?>


</body>
</html>
