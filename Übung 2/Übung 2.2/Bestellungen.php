<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} 
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



$sql2 = "SELECT first_name, last_name, order_date, shipped_date
FROM customers, orders
INNER JOIN orders ON id = customer_id";

foreach ($conn->query($sql2) as $row){ ?>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Order Date</th>
    <th>Shipped Date</th>
  </tr>

  <tr>
  <td> <?php echo $row['first_name']; ?> </td>
  <td> <?php echo $row['last_name']; ?> </td>
  <td> <?php echo $row['order_date']; ?> </td>
  <td> <?php echo $row['shipped_date']; ?> </td>
  </tr>
  <Style>
    table,
td,
th {
	border: 1px solid black;
}
</Style>
</table>

<?php } ?>