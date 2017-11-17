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

define("MIN_NAME_LENGTH", (integer) "3" , true);
define("MAX_NAME_LENGTH", "12", false);
define("MAX_MESSAGE_LENGTH", 500);

$errors[0] = 'INVALID_LENGTH';
$errors[1] = 'INVALID_PHONE_FORMAT';
$errors[2] = 'INVALID_MAIL_FORMAT';
$errors[] = 'INVALID_MONTH';
$errors[] = 'INVALID_GENDER';

global $genders;
$genders = array('mezczyzna' => 'male', 'kobieta' => 'female');


assign_identifier_to_variable_if_exists('first_name', $first_name);
assign_identifier_to_variable_if_exists('last_name', $last_name);
assign_identifier_to_variable_if_exists('email', $email_address );
assign_identifier_to_variable_if_exists('phone', $phone_number);
assign_identifier_to_variable_if_exists('birth_month', $month_of_birth);
assign_identifier_to_variable_if_exists('message_content', $message);
assign_identifier_to_variable_if_exists('gender', $gender);
assign_identifier_to_variable_if_exists('check_buy_online', $buy_online);
assign_identifier_to_variable_if_exists('check_need_advice',$need_advice);

$request_time = 'REQUEST_TIME';

echo "<p>Request time (in milis): $_SERVER[$request_time]</p><br>";

//Walidowanie żądania
if(!validate_name($first_name)){
    echo "<p>Podałeś niepoprawe imie!</p>";
    die();
}else{
    $welcome_text = 'Cześć '.$first_name."! Dziękujemy za wysłanie wiadomości";
    echo "<p>$welcome_text</p>";
}

if(!validate_phone($phone_number)){
    echo "<p>Podałeś niepoprawny numer telefonu!</p>";
    die();
}else{
    $normalized_phone = normalize_phone($phone_number);
    echo "<p>Podany numer telefonu: $normalized_phone</p>";
}

if(!validate_gender($gender,$genders)){
    $genders_count = count($genders);
    echo "<p>Podałeś niepoprawną płeć! Na świecie instnieją tylko $genders_count</p>";
    die();
}else{
    $selected_gender = find_gender($gender,$genders);
    echo "<p>Jestes: $selected_gender</p>";
}

if(checked($need_advice)){
    echo "<p>Widzę, że czasem potrzebujesz porady co do ubioru. Nasza aplikacja \"Decily\" będzie dla Ciebie idealna! Obserwuj nas na facebooku.</p>";
}

function check_if_exists_in_post_body($identifier)
{
    return array_key_exists($identifier, $_POST);
}

/*
 * Sprawdza czy zmienna przyszla w ciele metody post i jeśli tak przypisuja ją
 */
function assign_identifier_to_variable_if_exists($identifier, &$variable)
{
    if (check_if_exists_in_post_body($identifier)) {
        $variable = $_POST[$identifier];
    }
}

function validate_gender($gender, $all_genders){
    $valid = false;
    foreach ($all_genders as &$value){
        if($gender == $value){
            $valid = true;
        }
    }
    return $valid;
}

function find_gender($gender, $all_genders){
    reset($all_genders);
    if($gender == current($all_genders)){
        return key($all_genders);
    }
    next($all_genders);
    if($gender == current($all_genders)){
        return key($all_genders);
    }
    return key($all_genders);
}

function echo_errors($errors){
    for ($x = 0; $x <= sizeof($errors); $x++) {
        echo $errors[$x];
    }
}


function checked($check_box_value){
    return $check_box_value=="on";
}

function validate_name($name){
    if(strlen($name)<constant("MIN_NAME_LENGTH")){
        return false;
    }
    $max_name_length = constant("MAX_NAME_LENGTH");
    if(strlen($name)>settype($max_name_length,"integer")){
        return false;
    }
    return true;
}

function validate_phone($phone){
    return preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}$/", $phone);
}

function normalize_phone($phone){
    return preg_replace('*-*','',$phone);
}

?>


</body>
</html>
