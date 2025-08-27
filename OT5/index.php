<?php
    $tarefas = $_POST["tarefas"] ?? [];
    $erro = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nova_tarefa"]) && !empty(trim($_POST["nova_tarefa"]))) {
        $tarefas[] = trim($_POST["nova_tarefa"]); // corrigido aqui
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["remover"])) {
        $indice = filter_input(INPUT_POST,"remover", FILTER_VALIDATE_INT); // corrigido aqui
        if ($indice !== false && isset($tarefas[$indice])) {
            unset($tarefas[$indice]);
            $tarefas = array_values($tarefas);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <form method="post">
        <label>Nova Tarefa: <input type="text" name="nova_tarefa"></label>
        <button type="submit">Adicionar</button>
        <?php foreach ($tarefas as $indice => $tarefa): ?>
            <input type="hidden" name="tarefas[<?php echo $indice;?>]" value="<?php echo htmlspecialchars($tarefa)?>">
        <?php endforeach; ?>
    </form>
    <?php if (empty($tarefas)): ?>
        <p>Nenhuma tarefa adicionada.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($tarefas as $indice => $tarefa): ?>
                <li>
                    <?php echo htmlspecialchars($tarefa); ?>
                    <form method="post">
                        <?php foreach ($tarefas as $i => $t): ?>
                            <input type="hidden" name="tarefas[<?php echo $i; ?>]" value="<?php echo htmlspecialchars($t); ?>">
                        <?php endforeach; ?>
                        <button type="submit" name="remover" value="<?php echo $indice; ?>">Remover</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
