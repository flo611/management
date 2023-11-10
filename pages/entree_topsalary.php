<?php

$sql = "SELECT * FROM employe ORDER BY salaire DESC LIMIT 1";
$result = $db_connect->query($sql);

echo "<h2> Date d'entrée de la personne la mieux payée :</h2>";

if ($result !== false) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>Nom: " . $row["nom"] . "</p>";
        echo "<p>Date d'entrée: " . $row["date_entree"] . "</p>";
    }
} else {
    echo "Aucun résultat trouvé.";
}
?>