<?php
  

    $sql = "SELECT * FROM employe WHERE salaire > 2000 ORDER BY salaire DESC";
    $result = $db_connect->query($sql);
echo "<h2> salaries >2000 ordre décroissant :</h2>";

    if ($result !== false) {
        
   
        echo "<ul>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . $row["nom"] . " - Salaire: " . $row["salaire"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Aucun résultat trouvé.";
    }
