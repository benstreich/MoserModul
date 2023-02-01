
<?php

//Initialisierung
  session_start();


  $anzahl_aufrufe = 1;
  if (isset($_SESSION['anzahl_aufrufe'])) {
      $anzahl_aufrufe = $_SESSION['anzahl_aufrufe'];
  }
    
    echo "<h1 style='color:red'> Die Seite wurde {$anzahl_aufrufe}x aufgerufen.</h1>";
    
    $anzahl_aufrufe++;

   $_SESSION['anzahl_aufrufe'] = $anzahl_aufrufe;


?>

