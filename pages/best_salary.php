<?php
try {
    $sql_query = "SELECT id_employe, nom, prenom, salaire
                  FROM employe
                  WHERE salaire = (SELECT MAX(salaire) FROM employe)";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Personnes gagnant le salaire maximum :</h2>";

    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Nom: " . $row_sql["nom"] . " - Prénom: " . $row_sql["prenom"] . " - Salaire: " . $row_sql["salaire"] . "<br>";
        }
    } else {
        echo "Aucun résultat";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>