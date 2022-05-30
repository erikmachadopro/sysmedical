<?php

    include_once("../../conexao.php");

    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    // VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
    $res_c = $pdo->query("select * from medicos where cpf = '$cpf'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados_c);
    if($linhas == 0){
        $res = $pdo->prepare("UPDATE medicos set nome = :nome, especialidade = :especialidade, crm = :crm, cpf = :cpf, telefone = :telefone, email = :email where id = :id");

        $res->bindValue(":nome", $nome);
        $res->bindValue(":especialidade", $especialidade);
        $res->bindValue(":crm", $crm);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":telefone", $telefone);
        $res->bindValue(":email", $email);
        $res->bindValue(":id", $id);
        $res-> execute();

        echo "Registro editado com sucesso.";
    } else{
        echo "Este médico já está cadastrado.";
    }    
    
?>