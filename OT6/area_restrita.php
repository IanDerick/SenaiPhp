<?php
    session_start();

    if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
        header("Location: login.php");
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Restrita</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</h1>
    <p>Esta é uma área restrita acessível apenas para usuário para usuários logados.</p>
    <form method="post">
        <button type="submit" name="logout">Sair</button>
    </form>
</body>
</html>