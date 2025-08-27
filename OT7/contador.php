<?php
// Inicializa o contador de visitas
$visitas = isset($_COOKIE['visitas']) ? (int)$_COOKIE['visitas'] : 0;
$visitas++;

// Define o cookie com validade de 30 dias
setcookie('visitas', $visitas, time() + (30 * 24 * 60 * 60), '/');

// Mensagem de boas-vindas
$mensagem = $visitas === 1 ? 'Bem-vindo pela primeira vez!' : "Você visitou esta página $visitas vezes.";

// Reseta o contador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset'])) {
    setcookie('visitas', 0, time() - 3600, '/');
    header('Location: contador.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas</title>
</head>
<body>
    <h1>Contador de Visitas</h1>
    <p><?php echo htmlspecialchars($mensagem); ?></p>
    <form method="post">
        <button type="submit" name="reset">Resetar Contador</button>
    </form>
</body>
</html>