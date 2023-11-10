
<?php


$sql = "SELECT * FROM employe WHERE YEAR(date_entree) = 2021";
    $result = $db_connect->query($sql);

    echo "<ul>";

    if ($result !== false) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $row["nom"] . " " . $row["prenom"] . " - Date d'entrée: " . $row["date_entree"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
    
    ?>