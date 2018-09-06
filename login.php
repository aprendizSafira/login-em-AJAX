<?php
try {
    $pdo = new PDO("mysql:dbname=login_ajax;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "Erro no banco: ".$e->getMessage();
    exit;
}

if(!empty($_POST['email']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    //Verificando se existe essa senha e email no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();
    
    //Verificando se tem algum resultado
    if($sql->rowCount() > 0) {
        echo "Usuário logado com sucesso!!";
    } else {
        echo "Email e/ou senha errados!!";
    }
} else {
    echo "Digite um email e/ou senha!!";
}