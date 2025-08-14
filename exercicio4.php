<?php

    $num = 7;
    for ($i=1; $i<=10 ; $i++) { 
        $tab = $num * $i;
        echo"<br>$tab";
    }
    echo"<br>";
    $i = 2;
    $soma = 0;
    while ($i <= 10) {
        $soma += $i;
        $i++;
    }
    echo "Soma dos números: ".$soma;
?>