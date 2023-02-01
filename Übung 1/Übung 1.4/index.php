<?php
    $username = $_GET['username'];
    
    echo "Hallo {$username}!<br />";

    if ($_GET['age']) {
        $age = $_GET['age'];
        echo "Du bist {$age} Jahre alt.";
    }
?>