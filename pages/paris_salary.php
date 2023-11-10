<?php

$sql = "SELECT e.*, s.nom AS nom_service, s.ville
        FROM employe e
        JOIN service s ON e.service_id = s.id_service
        WHERE s.ville = 'Paris' AND e.salaire BETWEEN 1500 AND 2500";

$result = $db_connect->query($sql);

echo "<h2>Employés dont le service est à Paris et le salaire entre 1500 et 2500 euros :</h2>";

if ($result !== false) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Service</th><th>Date d'entrée</th><th>Salaire</th><th>Ville</th></tr>";
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["Id_employe"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["nom_service"] . "</td>";
        echo "<td>" . $row["date_entree"] . "</td>";
        echo "<td>" . $row["salaire"] . "</td>";
        echo "<td>" .$row["ville"]."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}
?>