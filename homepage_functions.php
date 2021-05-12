<?php

include 'config.php';
// Appel de la DB Covoiturage
function call_to_db()
{
    try {
        $options = [
            // Permet à PDO de lever des exceptions en cas d'erreur SQL
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // data source name
        $dsn = "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8";
        // instance de la base de données (pdo)
        $dbh = new PDO($dsn, USER, PWD, $options);
        // echo 'connecté !';
        return $dbh;
    } catch (PDOException $ex) {
        // message d'erreur
        printf("La connexion à la base de donnée à échouer avec le code %s", $ex->getCode());
        // arrêter l'exécution du script
        die();
    }
}

// Obtenir touts les rides
function get_the_last_rides()
{

    $the_db = call_to_db();
    // Requête SQL
    $sql =
        <<<'EOD'
        SELECT * FROM rides LIMIT 5;
EOD;
    // Exécuter la requête
    $total_recipes_Stmt = $the_db->query($sql);
    // Récuperer les données :
    $total = $total_recipes_Stmt->fetchAll();
    return $total;
}
