<?php
    $zahl1 = $_GET['zahl1'];

   echo "Die erste Zahl ist {$zahl1}!<br />";

   $zahl2 = $_GET['zahl2'];

   echo "Die erste Zahl ist {$zahl2}!<br />";

   $mode = $_GET['mode'];

   echo "Der Mode ist {$mode}!<br />";

   if ($mode == 'plus')
   echo $zahl1 + $zahl2;

   if ($mode == 'minus')
   echo $zahl1 - $zahl2;

   if ($mode == 'mal')
   echo $zahl1 * $zahl2;

   if ($mode == 'divi')
   echo $zahl1 / $zahl2;

   
?>