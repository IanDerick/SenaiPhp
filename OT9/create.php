<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = file_get_contents("data.json");
        $users = json_decode($data, true);
        
        if ($users === null) {
            $users = [];
        }

        $newId = count($users) > 0 ? max(array_column($users, 'id')) + 1 : 1;

        $newUser = [
            "id" => $newId,
            "name" => $_POST['name'],
            "email" => $_POST['email'],
        ];

        $users[] = $newUser;

        file_put_contents('data.json', json_encode($users));

        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra Novo Usuário</title>
</head>
<body>
    <h1>Cadastra Novo Usuário</h1>

    <form method="post">
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name"><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email"><br>
        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar para a Lista</a>
</body>
</html>