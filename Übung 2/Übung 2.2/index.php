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

?>


<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Job Title</th>
  </tr>

  <?php $sql = "SELECT * FROM customers";
  foreach ($conn->query($sql) as $row){ ?>


  <tr>
  <td> <?php echo $row['first_name']; ?> </td>
  

  
  <td> <?php echo $row['last_name']; ?> </td>
 

  
  <td> <?php echo $row['job_title']; ?> </td>
  </tr>


  <?php } ?>
  <Style>
    table,
td,
th {
	border: 1px solid black;
}
</Style>
</table>






