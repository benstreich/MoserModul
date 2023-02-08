<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br />";

mysqli_select_db($conn, $database);

echo "Datenbank ausgewählt!<br />";


$sql = "SELECT * FROM customers 
WHERE job_title = 'Purchasing Representative'
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  

 while ($redord = mysqli_fetch_assoc($result)){
  d($redord);

 }




  echo $result->num_rows . " Resultate";

} else {
  echo "Keine Resultate vorhanden";
}



function d($para){
  echo "<pre>";
  var_dump($para);
  echo "</pre>";
}
?>

