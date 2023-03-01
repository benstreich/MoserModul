<Style>
    table,
td,
th {
	border: 1px solid black;
}
</Style>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully<br />";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
echo "<h2>Datenausgabe</h2>";
$statement = $conn->prepare("SELECT * FROM customers");
$statement->execute();
?>
<table>
    <tr>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>Job</th>
        <th>Adresse</th>
        <th>Stadt</th>
    </tr>
    <?php
    while($row = $statement->fetch()){

        echo "<tr>";
            echo "<td>{$row['last_name']}</td>";
            echo "<td>{$row['first_name']}</td>";
            echo "<td>{$row['job_title']}</td>";
            echo "<td>{$row['address']}</td>";
            echo "<td>{$row['city']}</td>";
           /* echo "<td><a href='orders.php?id=".htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8')."'>Bestellungen</a></td>"; */
        echo "</tr>";
    }
?>
</table>