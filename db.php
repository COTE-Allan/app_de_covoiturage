<?php

require_once __DIR__. `config.php`;

function db(){

    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        // instance de la base de données (pdo)
        $dbh = new PDO($dsn, USER, PWD, $options);
        return $dbh;

    } catch (PDOException $ex) {
        // message d'erreur
        printf('La connexion à la base de donnée a échouée avec le code "%s"', $ex->getCode());
		// echo '<pre>'.print_r($ex, true).'</pre>';
        // arrêter l'exécution du script
        die();
    }
}
// db();

// $dbh -> query("SELECT * FROM `users`");
// $dbh-> prepare($sql);