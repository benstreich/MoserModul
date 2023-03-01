<?php
// DB Verbindung herstellen
$servername = "localhost";
$username = "root";
$password = "";
$database = "northwind";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<div class='disconnected'>";
    echo "Connection failed: " . $e->getMessage() . "<br>";
    echo "</div>";
}
// Preset Daten laden
$preset = null;
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $sql = "SELECT * FROM customers WHERE id = :id";
    $statement = $conn->prepare($sql);
    $statement->execute([
            ':id' => $_GET['id']
    ]);
    $preset = $statement->fetch();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($preset) {
        $sql = "UPDATE customers SET company = :company,
                     last_name = :last_name,
                     first_name = :first_name,
                     email_address = :email_address
                 WHERE id = :id";
        $statement = $conn->prepare($sql);
        $statement->execute([
                ':company' => $_POST['company'],
                ':last_name' => $_POST['last_name'],
                ':first_name' => $_POST['first_name'],
                ':email_address' => $_POST['email_address'],
                ':id' => $_GET['id'],
        ]);
        $sql = "SELECT * FROM customers WHERE id = :id";
        $statement = $conn->prepare($sql);
        $statement->execute([
            ':id' => $_GET['id']
        ]);
        $preset = $statement->fetch();
    } else {
        header('Location: index.php');
        die();
    }
}
?>
<form method="POST" action="edit.php?id=<?= $preset ? $preset['id'] : '' ?>">
    <input value="<?= $preset ? $preset['company'] : ''  ?>" type="text" name="company" placeholder="Firma"><br>
    <input value="<?= $preset ? $preset['last_name'] : ''  ?>" type="text" name="last_name" placeholder="Nachname"><br>
    <input value="<?= $preset ? $preset['first_name'] : ''  ?>" type="text" name="first_name" placeholder="Vorname"><br>
    <input value="<?= $preset ? $preset['email_address'] : ''  ?>" type="email" name="email_address" placeholder="Email"><br>
    <button type="submit">Speichern</button>
</form>