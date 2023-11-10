<?php

$sql = "SELECT * FROM employe ORDER BY salaire DESC LIMIT 3";
$result = $db_connect->query($sql);
echo "<h2>top 3 des salaires :</h2>";
echo "<ul>";

if ($result !== false) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>" . $row["nom"] . " - Salaire: " . $row["salaire"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun résultat trouvé.";
}
?>