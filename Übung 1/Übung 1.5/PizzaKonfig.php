<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pizza Ding</title>
</head>
<body>
   <h1>Pizza Konfigurator</h1>
   
   <form method="POST" action="http://mosermodul.test/%C3%9Cbung%201/%C3%9Cbung%201.5/PizzaKonfig.php">
   
      <select name="zutaten">
      <option value="Zutat auswählen">Zutat auswählen</option>
      <option value="Salami">Salami</option>
      <option value="Zwiebeln">Zwiebeln</option>
      <option value="Speck">Speck</option>
      <option value="Extra Käse">Extra Käse</option>

   </select> 
      <input type="submit" value="Hinzufügen">
   </form> <br>

   <?php


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $zutat = array($_POST['zutaten']);

      foreach($zutat as $zutaten => $val) {
         echo "$zutaten = $val<br>";
       }
    }
   ?>


   


</body>
</html>