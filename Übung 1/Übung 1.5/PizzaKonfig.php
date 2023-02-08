<?php
session_start();

$Zutaten = array();
if (isset($_SESSION['Zutaten'])) {
    $Zutaten = $_SESSION['Zutaten'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Zutat = $_POST['Zutat'];
    array_push($Zutaten, $Zutat);
    $_SESSION['Zutaten'] = $Zutaten;
}
?>


<h1>Pizzakonfigurator</h1>


<p>Deine Pizza besteht aus folgenden Zutaten:</p>


<ul>
    <?php 
    foreach ($Zutaten as $value) {
        echo "<li>
        $value
        </li>";
      }
    ?>
</ul>

<form method="POST" action="http://m151.test/Uebungen/Uebung1.5/PizzaKonfigurator.php">
    <input type="text" name="Zutat" placeholder="Zutat" />
    <input type="submit" value="Absenden"/>
</form>
