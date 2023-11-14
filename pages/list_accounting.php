<?php
try {
    $sql_query = "SELECT e.id_employe, e.nom, e.prenom, s.nom AS service_nom
    FROM employe e
    JOIN service s ON e.service_id = s.id_service
    WHERE s.nom = 'Accounting'";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Liste employés service accounting :</h2>";
    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Nom: " . $row_sql["nom"] . " - Prénom: " . $row_sql["prenom"] . " - Service: " . $row_sql["service_nom"] . "<br>";
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<?php
try {
    $sql_query = "SELECT e.id_employe, e.nom, e.prenom, s.nom AS service_nom
                  FROM employe e
                  JOIN service s ON e.service_id = s.id_service
                  WHERE s.nom = 'Accounting' AND s.ville = 'Lyon'";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Liste employés du service Accounting basé à Lyon :</h2>";
    
    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Nom: " . $row_sql["nom"] . " - Prénom: " . $row_sql["prenom"] . " - Service: " . $row_sql["service_nom"] . "<br>";
        }
    } else {
        echo "0 results";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>