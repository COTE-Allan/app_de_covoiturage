<?php
// Récupération Header
require_once __DIR__ . '/inc/header.php';
// Démarrage Session
session_start();
if (!isset($_SESSION["user_connected_id"])) {
    $_SESSION["user_connected_id"] = 'disconnected';
    $_SESSION["user_connected_first_name"] = '';
    $_SESSION["user_connected_last_name"] = '';
}
?>

<!-- ----------------------------------------- -->
<!-- Début du Main -->
<!-- ----------------------------------------- -->


<div class="row my-5">
    <div class="col">
        <h1 class="text-white text-center">
            Fichier de base pour développer :)
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="first_name">Prénom :</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse mail :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="phone" name="phone" id="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-light d-block mx-auto mt-5">Créer un compte</button>
        </form>
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Adresse mail :</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-light d-block mx-auto mt-5">Se connecter</button>

        </form>
    </div>
</div>




<!-- ----------------------------------------- -->
<!-- Fin du Main -->
<!-- ----------------------------------------- -->

<?php
// Récupération Header
require_once __DIR__ . '/inc/footer.php';
?>