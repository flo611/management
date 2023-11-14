<?php
try {
    $sql_query = "SELECT id_employe, nom, prenom, fonction
                  FROM employe
                  WHERE fonction LIKE 'A%'";

    $result_sql = $db_connect->query($sql_query);
    echo "<h2>Employés dont la fonction commence par 'A' :</h2>";

    if ($result_sql->rowCount() > 0) {
        while ($row_sql = $result_sql->fetch(PDO::FETCH_ASSOC)) {
            echo " - Nom: " . $row_sql["nom"] . " - Prénom: " . $row_sql["prenom"] . " - Fonction: " . $row_sql["fonction"] . "<br>";
        }
    } else {
        echo "Aucun résultat";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>