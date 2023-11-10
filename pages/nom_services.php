<?php
$sql = "SELECT e.id_employe, e.nom, e.prenom, s.nom AS nom_service, e.date_entree
FROM employe e
JOIN service s ON e.service_id = s.id_service
WHERE s.ville = 'Dijon'";

$result = $db_connect->query($sql);

echo "<h2>Employés dont le service est basé à Dijon :</h2>";

if ($result !== false) {
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Service</th><th>Date d'entrée</th></tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
echo "<tr>";
echo "<td>" . $row["id_employe"] . "</td>";
echo "<td>" . $row["nom"] . "</td>";
echo "<td>" . $row["prenom"] . "</td>";
echo "<td>" . $row["nom_service"] . "</td>";
echo "<td>" . $row["date_entree"] . "</td>";
echo "</tr>";
}

echo "</table>";
} else {
echo "Aucun résultat trouvé.";
}
?>