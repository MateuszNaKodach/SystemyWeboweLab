<?php
/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 22.11.2017
 * Time: 01:05
 */


/**
 * Checking if identifier exists in request body and assign it to variable
 * @param $identifier
 * @param $variable
 */
function assign_identifier_to_variable_if_exists_in_post_body($identifier, &$variable)
{
    if (check_if_exists_in_post_body($identifier)) {
        $variable = $_POST[$identifier];
    }
}