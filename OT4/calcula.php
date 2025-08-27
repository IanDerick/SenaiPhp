<?php
    function calcular($num1, $num2, $operacao){
        switch ($operacao) {
            case "soma":
                return $num1 + $num2;
                break;
            case "subtracao":
                return $num1 - $num2;
                break;
            case "multiplicacao":
                return $num1 * $num2;
                break;
            case "divisao":
                return $num1 / $num2;
                break;
            default:
                return "Operação inválida!";
        }
    }

    $resultado = "";
    $num1 = "";
    $num2 = "";
    $operacao = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = filter_input(INPUT_POST,"num1", FILTER_VALIDATE_FLOAT);
        $num2 = filter_input(INPUT_POST,"num2", FILTER_VALIDATE_FLOAT);
        $operacao = $_POST["operacao"] ?? "";

        if ($num1 !== false || $num2 !== false && !empty($operacao)) {
            $resultado = calcular($num1, $num2, $operacao);
        }else {
            $resultado = "Por favor, insira números válidos!";
        }
    }
?>
