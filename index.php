<?php
include "homepage_functions.php";

// Variables :
$the_last_rides = get_the_last_rides();
if (empty($the_last_rides) || !isset($the_last_rides)) {
    $the_last_rides = FALSE;
};

include "validation_simplified_search.php"

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Homepage</title>
</head>

<body>
    <div class="container">
        <h1 class="my-5">Bienvenue !</h1>
        <!-- FORMULAIRE Simplifié -->
        <form method="POST">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control text-center" placeholder="D'où partez-vous ?" name="POST_starting_town">
                    <!-- Message d'erreur si l'entrée est défini sur TRUE (voir validation_simplified.php) -->
                    <?php
                    if ($the_starting_town == TRUE) {
                    ?>
                        <small class="form-text text-danger"><?= $the_starting_town_error_message ?>
                        </small>
                    <?php } ?>
                </div>
                <div class="col">
                    <input type="text" class="form-control text-center" placeholder="Où allez-vous ?" name="POST_going_town">
                    <?php
                    if ($the_going_town == TRUE) {
                    ?>
                        <small class="form-text text-danger"><?= $the_going_town_error_message ?>
                        </small>
                    <?php } ?>
                </div>
                <div class="col">
                    <input type="date" class="form-control text-center" placeholder="Quand ça ?" name="POST_ride_date">
                    <?php
                    if ($the_ride_date == TRUE) {
                    ?>
                        <small class="form-text text-danger"><?= $the_ride_date_error_message ?>
                        </small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col d-flex justify-content-center">
                    <button type="" class="btn-lg btn-primary mt-4">Top départ !</button>
                </div>
            </div>
        </form>
        <h1 class="my-5">Derniers trajets publiés :</h1>
        <ul class="list-group list-group-flush">
            <!-- Création des trajets récents : -->
            <?php foreach ($the_last_rides as $the_ride) {
                $the_ride_id = $the_ride[0];
                $the_starting_town = $the_ride[1];
                $the_going_town = $the_ride[2];
                $the_ride_date = $the_ride[3];
                $the_availables_seats = $the_ride[5];
                $the_ride_price = $the_ride[6];
            ?>
                <li class="list-group-item d-flex justify-content-between">
                    <p>
                        <!-- Concaténation qui pique les yeux mais tkt -->
                        <?=
                        $the_starting_town . " -> " . $the_going_town . " | " . $the_ride_date . " | " . $the_availables_seats . " sièges restants | " . $the_ride_price . "€"
                        ?>
                    </p>
                    <div>
                        <!-- Connecté ou pas ? -->
                        <?php
                        if (isset($_SESSION["user_connected_id"]) && $_SESSION["user_connected_id"] != 'disconnected') { ?>
                            <a href="?ride=<?= $the_ride_id ?>" class="p-2 btn-sm btn-primary text-decoration-none">Je prend !</a>
                        <?php } else { ?>
                            <a href="login.php" class="p-2 btn-sm btn-primary text-decoration-none">Je prend !</a>
                        <?php } ?>

                    </div>
                </li>
            <?php
            } ?>
        </ul>
        <!-- Si aucun trajet -->
        <?php
        if ($the_last_rides == FALSE) { ?>
            <p class="display-4 text-center">Aucun trajets ici !</p>
        <?php
        }
        ?>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>