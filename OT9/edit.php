<?php
$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$data = file_exists("data.json") ? file_get_contents("data.json") : "[]";
$users = json_decode($data, true);

if ($users === null) {
    $users = [];
}

$user = null;
foreach ($users as $index => $u) {
    if ($u["id"] == $id) {
        $user = &$users[$index]; 
        break;
    }
}

if (!$user) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user["name"] = $_POST["name"];
    $user["email"] = $_POST["email"];

    file_put_contents("data.json", json_encode($users, JSON_PRETTY_PRINT));

    header("Location: index.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form method="post">
        <label for="name">Nome: </label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($user["name"]) ?>" required><br>

        <label for="email">email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user["email"]) ?>" required><br>

        <button type="submit">Salvar</button>
    </form>
    <a href="index.php">Voltar para a lista</a>
</body>
</html>