<!DOCTYPE html>
<html>
<head>
	<title>Kunde hinzufügen</title>
</head>
<body>
	<form method="post" action="index.php">
	  <label for="first_name">Vorname:</label>
	  <input type="text" id="first_name" name="first_name" required><br><br>
	  
	  <label for="last_name">Nachname:</label>
	  <input type="text" id="last_name" name="last_name" required><br><br>
	  
	  <label for="job_title">Job:</label>
	  <input type="text" id="job_title" name="job_title" required><br><br>
	  
	  <label for="address">Adresse:</label>
	  <input type="text" id="address" name="address" required><br><br>
	  
	  <label for="city">Stadt:</label>
	  <input type="text" id="city" name="city" required><br><br>
	  
	  <input type="submit" value="Kunde hinzufügen">
	</form>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "northwind";

	try {
	  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $first_name = $_POST["first_name"];
	  $last_name = $_POST["last_name"];
	  $job_title = $_POST["job_title"];
	  $address = $_POST["address"];
	  $city = $_POST["city"];

	  $sql = "INSERT INTO customers (first_name, last_name, job_title, address, city) VALUES (?, ?, ?, ?, ?)";
	  $stmt= $conn->prepare($sql);
	  $stmt->execute([$first_name, $last_name, $job_title, $address, $city]);

	  // Redirect to orders.php
	  header("Location: customers.php");
	  exit();
	}
	?>
</body>
</html>