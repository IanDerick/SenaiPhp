<?php
    $data = file_get_contents("data.json");
    $users = json_decode($data, true);

    if ($users === null) {
        $users = [];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <a href="create.php">Cadastrar Novo Usuário</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id'])?></td>
                    <td><?= htmlspecialchars($user['name'])?></td>
                    <td><?= htmlspecialchars($user['email'])?></td>
                    <td>
                        <a href="edit.php?id=<?= $user['id']?>">Editar</a>
                        <a href="delete.php?id=<?= $user['id']?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>