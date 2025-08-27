<?php
    function calcular($num1, $num2, $operacao){
        switch ($operacao) {
            case "soma":
                return $num1 + $num2;
            case "subtracao":
                return $num1 - $num2;
            case "multiplicacao":
                return $num1 * $num2;
            case "divisao":
                return $num1 / $num2;
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

        if ($num1 !== false && $num2 !== false && !empty($operacao)) {
            $resultado = calcular($num1, $num2, $operacao);
        } else {
            $resultado = "Por favor, insira números válidos!";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora Simples</h1>
    <form method="post">
        <label>Número 1: <input type="number" name="num1" step="any" value="<?php echo htmlspecialchars($num1); ?>" required></label><br>
        <label>Número 2: <input type="number" name="num2" step="any" value="<?php echo htmlspecialchars($num2); ?>" required></label><br>
        <label>Operação:
            <select name="operacao"required>
                <option value="">Selecione</option>
                <option value="soma" <?php echo $operacao === 'soma' ? 'selected' : ''; ?> >Soma</option>
                <option value="subtracao" <?php echo $operacao === 'subtracao' ? 'selected' : ''; ?> >Subtração</option>
                <option value="multiplicacao" <?php echo $operacao === 'multiplicacao' ? 'selected' : ''; ?> >Multiplicação</option>
                <option value="divisao" <?php echo $operacao === 'divisao' ? 'selected' : ''; ?> >Divisão</option>
            </select>
        </label><br>
        <button type="submit">Calcular</button>
    </form>
    <?php if ($resultado !== ''): ?>
        <h3>Resultado: <?php echo htmlspecialchars($resultado); ?></h3>
    <?php endif; ?>
</body>
</html>