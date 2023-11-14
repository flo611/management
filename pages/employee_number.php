
<?php
$count_query = "SELECT COUNT(*) AS total_employees FROM employe;";
$total_salary_query = "SELECT SUM(salaire) AS total_salary FROM employe;";
$average_salary_query = "SELECT AVG(salaire) AS average_salary FROM employe;";
$median_salary_query = "SELECT nom, salaire FROM employe WHERE salaire > (SELECT AVG(salaire) FROM employe)";

$result = $db_connect->query($count_query);
$result_salary = $db_connect->query($total_salary_query);
$result_average_salary = $db_connect->query($average_salary_query);
$result_median = $db_connect->query($median_salary_query);


if (!$result) {
    die("Query failed: " . $db_connect->error);
}

$row = $result->fetch(PDO::FETCH_ASSOC);
$total_employees = $row['total_employees'];


$row_salary = $result_salary->fetch(PDO::FETCH_ASSOC);
$total_salary = $row_salary['total_salary'];

$row_average_salary = $result_average_salary->fetch(PDO::FETCH_ASSOC);
$average_salary = $row_average_salary['average_salary'];

$median_data = $result_median->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Nombre total d'employés :</h2>";
echo "<p>Le nombre total d'employés dans la table 'employe' est : $total_employees employés</p>";


echo "<h2>Total des salaires de l'entreprise :</h2>";
echo "<p>Le total des salaires de l'entreprise est : $total_salary €</p>";


echo "<h2>Total des employés gagnent + que la moyenne du salaire moyen :</h2>";
echo "<p>Le salaire moyen des employés est : $average_salary €</p>";
echo "<p>Le total des employés qui gagnent + que la moyenne du salaire moyen :</p>";
echo "<ul>";
foreach ($median_data as $employee) {
    echo "<li>{$employee['nom']} - {$employee['salaire']} €</li>";
}
echo "</ul>";

?>