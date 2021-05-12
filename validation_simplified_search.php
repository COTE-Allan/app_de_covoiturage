<?php

// Variables
$the_date_of_today = date('Y-m-d') . ' 00:00:00';
// Messages Erreurs
$the_ride_date_error_message = $the_going_town_error_message = $the_starting_town_error_message = null;
// Entrées nettoyées (TRUE = Erreur, FALSE = Pas encore défini)
$the_ride_date = FALSE;
$the_starting_town = FALSE;
$the_going_town = FALSE;


// Si POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ==========================
    if (empty($_POST["POST_starting_town"])) {
        // Vide ?
        $the_starting_town_error_message = "Veuillez indiquer une ville de départ.";
        $the_starting_town = TRUE;
    } else {
        // Nettoyage
        $the_starting_town = test_input($_POST["POST_starting_town"]);
        // Regex faux ?
        if (check_if_name($the_starting_town) == 1) {
            $the_starting_town_error_message = "Seules les lettres sont autorisées !";
            $the_starting_town = TRUE;
        }
    }
    // ==========================
    if (empty($_POST["POST_going_town"])) {
        // Vide ?
        $the_going_town_error_message = "Veuillez indiquer une ville d'arrivée.";
        $the_going_town = TRUE;
    } else {
        // Nettoyage
        $the_going_town = test_input($_POST["POST_going_town"]);
        // Regex faux ?
        if (check_if_name($the_going_town) == 1) {
            $the_going_town_error_message = "Seules les lettres sont autorisées !";
            $the_going_town = TRUE;
        }
    }
    // ==========================
    if (empty($_POST["POST_ride_date"])) {
        // Vide ?
        $the_ride_date_error_message = "Veuillez indiquer une date.";
        $the_ride_date = TRUE;
    } else {
        // Nettoyage
        $the_ride_date = test_input($_POST["POST_ride_date"]);
        // Regex faux ?
        if (check_if_date($the_ride_date) == 1) {
            $the_ride_date_error_message = "Seules les dates sont autorisées !";
            $the_ride_date = TRUE;
        } else if ($the_date_of_today > $the_ride_date) {
            // Date déjà passé ?
            $the_ride_date_error_message = "La date est déjà passée !";
            $the_ride_date = TRUE;
        }
    }
}



// Fonctions de nettoyage
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function check_if_name($value)
{
    return !preg_match("/^[A-Za-z]+$/", $value);
}
function check_if_date($birthdate)
{
    return !preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/", $birthdate);
}
