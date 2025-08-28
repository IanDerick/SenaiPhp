<?php
    $mensagem = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["imagem"])) {
        $permitidos = ["image/jpeg", "image/png", "image/gif"];
        $tamanho_max = 2 * 1024 * 1024; // 2MB
        $arquivo = $_FILES["imagem"];

        if ($arquivo["error"] === UPLOAD_ERR_OK) {
            if (in_array($arquivo["type"], $permitidos) && $arquivo["size"] <= $tamanho_max) {
                $destino = "uploads/" . basename($arquivo["name"]);
                if (move_uploaded_file($arquivo["tmp_name"], $destino)) {
                    $mensagem = "Arquivo enviado com sucesso!";
                } else {
                    $mensagem = "Erro ao mover o arquivo.";
                }
            } else {
                $mensagem = "Arquivo inválido ou muito grande.";
            }
        } else {
            $mensagem = "Erro no upload: " . $arquivo["error"];
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Imagem</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="imagem" accept="image/*" required>
        <button type="submit">Enviar</button>
    </form>
    <?php if ($mensagem): ?>
        <p><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>
</body>
</html>
