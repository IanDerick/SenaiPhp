<?php

    $num  = 2;

    if($num %2 == 0){
        echo "É par<br>";
    }else{
        echo "É Impar<br>";
    }

    if($num < 0) {
        echo "$num é negativo";
    }else if ($num == 0 ) {
        echo "É Zero";
    } else if ($num > 0) {
        echo "$num é positivo";
    }else {
        echo "INVALIDO!";
    }
?>