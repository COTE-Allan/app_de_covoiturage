<!-- ---------------------------------------------
    Fichier de Fonctions
---------------------------------------------- -->

<?php

function bdd_connect()
{
    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = 'mysql:host=' . BDD_HOST . ';dbname=' . BDD_NAME . ';charset=utf8';
        // instance de la base de données (pdo)
        $bdd_instance = new PDO($dsn, BDD_USER, BDD_PWD, $options);
        // printf('Connexion Base De Données - Active');
        return $bdd_instance;
    } catch (PDOException $ex) {
        printf('Connexion Base De Données - Erreur code "%s"', $ex->getCode());
        // arrêter l'exécution du script
        // die();
    }
}

function add_user($first_name, $last_name, $email, $password, $phone)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
        INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `phone`)
        VALUES (:first_name, :last_name, :email, :password, :phone)
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':phone', $phone);
    $stmt->execute();
}

function get_connect($email, $password)
{
    $bdd_instance = bdd_connect();
    $request = <<<EOD
            SELECT
                `user_id`, `first_name`, `last_name`, `email`, `password`
            FROM `users`
            WHERE `email` = :email;
EOD;
    $stmt = $bdd_instance->prepare($request);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result[0]['password'] == $password) {
        $_SESSION["user_connected_id"] = $result[0]['user_id'];
        $_SESSION["user_connected_first_name"] = $result[0]['first_name'];
        $_SESSION["user_connected_last_name"] = $result[0]['last_name'];
        return 'Connecté';
    } else {
        return 'error';
    }
}

function disconnect_user() {
    $_SESSION["user_connected_id"] = 'disconnected';
    $_SESSION["user_connected_first_name"] = '';
    $_SESSION["user_connected_last_name"] = '';
}

?>