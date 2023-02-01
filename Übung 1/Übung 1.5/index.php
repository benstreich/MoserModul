<form method="POST" action="http://mosermodul.test/%c3%9cbung%201/%c3%9cbung%201.5/">
    <input type="text" name="name" placeholder="Benutzername" />
    <input type="submit" value="Absenden" />
</form>


<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['name'];
        echo "Hallo {$username}!";
    }
?>