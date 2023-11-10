<?php

$sql = "SELECT * FROM employe WHERE salaire > 2500 AND (commission > 3 OR commission IS NULL)";
$result = $db_connect->query($sql);
echo "<h2> Salaire > 2500 ou commission > 3 </h2>";
echo "<ul>";

if ($result !== false) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>" . $row["nom"] . " - Salaire: " . $row["salaire"] . " - Commission: " . $row["commission"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun résultat trouvé.";
}
?>
