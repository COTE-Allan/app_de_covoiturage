<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
                    Covoite
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Créer un trajet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chercher un trajet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Conactez nous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Infos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php // Condition de Connecté
            if (isset($_SESSION["user_connected_id"]) && $_SESSION["user_connected_id"] != 'disconnected') {
            ?>
                <a href=""><img src="" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            <?php } else { ?>
                <button class="btn btn-outline-success my-2 my-sm-0">Connexion</button>
            <?php } ?>
        </nav>
    </header>