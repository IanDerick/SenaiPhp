<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $url = $_POST["url"];
        if(empty($nome) || empty($email)){
            echo"Nome e E-mail são OBRIGATÓRIOS!";
        }elseif(!preg_match("/^[a-zA-z ]*$/", $nome)){

        }elseif ($idade < 18 || $idade >100) {
            echo "A idade deve ser entre 18 e 100 anos!";   
        }elseif (!preg_match("/^[0-9]{11}$/", $telefone)) {     
            echo "O número de telefone deve ter 11 digitos.";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<br>Email inválido!";
        }else {
            echo "Formulário enviado com sucesso!<br>";
            echo "Nome: $nome<br>Idade: $idade<br>E-mail: $email<br>Telefone: $telefone<br>URL: $url";
        }
    }
?>