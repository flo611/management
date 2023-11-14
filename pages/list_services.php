<?php

try {
    $sql_query = "SELECT s.nom AS service_nom, COUNT(e.Id_employe) AS nombre_employes
                  FROM service s
                  LEFT JOIN employe e ON e.service_id = s.id_service
                  GROUP BY s.nom
                  HAVING COUNT(e.Id_employe) >= 5";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Services avec 5 employés ou plus :</h2>";

    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Service: " . $row_sql["service_nom"] . " - Nombre d'employés: " . $row_sql["nombre_employes"] . "<br>";
        }
    } else {
        echo "Aucun résultat";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>