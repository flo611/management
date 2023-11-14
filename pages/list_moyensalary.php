<?php

try {
    $sql_query = "SELECT s.nom AS service_nom, AVG(e.salaire) AS salaire_moyen
                  FROM employe e
                  JOIN service s ON e.service_id = s.id_service
                  GROUP BY s.nom";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Salaire moyen par service :</h2>";

    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Service: " . $row_sql["service_nom"] . " - Salaire moyen: " . $row_sql["salaire_moyen"] . "<br>";
        }
    } else {
        echo "Aucun résultat";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>