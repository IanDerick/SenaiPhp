<?php
    $id = $_GET["id"] ?? null;

    if (!$id) {
        header("Location: index.php");
        exit;
    }

    $data = file_get_contents("data.json");
    $users = json_decode($data, true);

    if ($users === null){
        $users = [];
    }

    $updateUsers = array_filter($users, function ($user) use ($id) {
        return $user["id"] != $id;
    });

    file_put_contents("data.json", json_encode(array_values($updateUsers)));

    header("Location: index.php");
    exit;
?>