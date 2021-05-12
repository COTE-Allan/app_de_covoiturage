<?php
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Démarrage Session
session_start();
$debug = 'Null';

// Vérification existance variable session
if (!isset($_SESSION["user_connected_id"])) {
    $_SESSION["user_connected_id"] = 'disconnected';
    $_SESSION["user_connected_first_name"] = '';
    $_SESSION["user_connected_last_name"] = '';
}

// Vérification envoi du formulaire Création Utilisateur
if (isset($_POST['cr_email'])) {
    $debug = 'Création Utilisateur!';
    add_user($_POST['cr_first_name'], $_POST['cr_last_name'], $_POST['cr_email'], $_POST['cr_password'], $_POST['cr_phone']);
    unset($_POST);
}

// Vérification envoi du formulaire Connexion Utilisateur
if (isset($_POST['co_email'])) {
    $debug = get_connect($_POST['co_email'], $_POST['co_password']);
}

// Vérification envoi du formulaire Déconnexion Utilisateur
if (isset($_POST['dc_button'])) {
    $debug = 'Déconnexion!';
    disconnect_user();
}

// Condition de Connecté
if (isset($_SESSION["user_connected_id"]) && $_SESSION["user_connected_id"] != 'disconnected') {
    // Code à déclencher car connecté
}

?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row my-5">
    <div class="col">
        <h1 class="text-white text-center">
            Système de Compte :)

        </h1>
        <p class="text-center">
            <a href="login.php">
                Reset Form
            </a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="cr_first_name">Prénom :</label>
                <input type="text" name="cr_first_name" id="cr_first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cr_last_name">Nom :</label>
                <input type="text" name="cr_last_name" id="cr_last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cr_email">Adresse mail :</label>
                <input type="email" name="cr_email" id="cr_email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cr_password">Mot de passe :</label>
                <input type="password" name="cr_password" id="cr_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cr_phone">Téléphone :</label>
                <input type="phone" name="cr_phone" id="cr_phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-light d-block mx-auto mt-5">Créer un compte</button>
        </form>
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="co_email">Adresse mail :</label>
                <input type="email" name="co_email" id="co_email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="co_password">Mot de passe :</label>
                <input type="password" name="co_password" id="co_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-light d-block mx-auto mt-5">Se connecter</button>
        </form>
        <form method="POST" action="">
            <input type="submit" name="dc_button" id="dc_button" value="Se déconnecter" class="btn btn-light d-block mx-auto mt-5">
        </form>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <p>DEBUG : <?= $debug; ?></p>
        <p>Id : <?= $_SESSION["user_connected_id"]; ?></p>
        <p>Prénom : <?= $_SESSION["user_connected_first_name"]; ?></p>
        <p>Nom : <?= $_SESSION["user_connected_last_name"]; ?></p>
    </div>
</div>


<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Header
require_once __DIR__ . '/inc/footer.php';
?>