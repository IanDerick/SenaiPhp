<?php
    session_start();

    $usuario_valido = "admin";
    $senha_valida = "123456";
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset( $_POST["login"])) {
        $usuario = $_POST["usuario"] ?? "";
        $senha = $_POST["senha"] ?? "";
        
        if ($usuario == $usuario_valido && $senha === $senha_valida) {
            $_SESSION["logado"] = true;
            $_SESSION["usuario"] = $usuario;
            header("Location: area_restrita.php");
            exit;
        }else {
            $mensagem = "Usuário ou senha inválidos!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistma de Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if ($mensagem): ?>
        <p style="color:red;"><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>
    <form method="post">
        <label>Usuário: <input type="text" name="usuario" required></label><br>
        <label>Senha: <input type="password" name="senha" required></label><br>
        <button type="submit" name="login">Entrar</button>
    </form>
</body>
</html>