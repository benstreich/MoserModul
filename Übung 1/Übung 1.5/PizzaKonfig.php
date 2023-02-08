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

<form method="POST" action="?">
    <input type="text" name="Zutat" placeholder="Zutat" />
    <input type="submit" value="Absenden"/>
</form>




<!--
   1. Session starten 
   2. Daten aus Session lesen

   3. Daten verändern
   4. Daten in Session speichern

-!>


<!- $var = $x > 5 ? "grösser als 5" : "kleiner als 5"