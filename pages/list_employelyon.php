<?php

try {
    $sql_query = "SELECT e.nom AS nom_employe, e.prenom AS prenom_employe, s.nom AS nom_service
                  FROM employe e
                  LEFT JOIN service s ON e.service_id = s.id_service
                  WHERE s.ville = 'Lyon'";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Liste des employés dont le service se trouve à Lyon :</h2>";

    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Employé: " . $row_sql["prenom_employe"] . " " . $row_sql["nom_employe"] . " - Service: " . $row_sql["nom_service"] . "<br>";
        }
    } else {
        echo "Aucun résultat";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>