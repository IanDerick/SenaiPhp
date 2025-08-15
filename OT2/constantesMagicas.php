<?php

    echo "Linha atual: ".__LINE__;
    echo "<br>Arquivo: ".__FILE__;
    echo "<br>Diretório: ".__DIR__;

    function test() {
        echo "<br>Função:".__FUNCTION__;
    }
    test();
    
    class Exemplo{
        public function mostrar() {
            echo "<br>Classe: ".__CLASS__;
            echo "<br>Método: ".__METHOD__. "<br>";
        }
    }
    $obj = new Exemplo();
    $obj->mostrar();
?>