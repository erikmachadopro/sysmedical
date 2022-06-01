<?php

    require_once("../../conexao.php");

    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $cpf_antigo = $_POST['cpf_antigo'];
    $turno = $_POST['turno'];

    if($cpf_antigo != $cpf){
        // VERIFICAR SE O MÉDICO JÁ ESTÁ CADASTRADO
        $res_c = $pdo->query("select * from medicos where cpf = '$cpf'");
        $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
        $linhas = count($dados_c);

        if($linhas != 0){
            echo "Este médico já está cadastrado.";
            exit();
        } 
    }
   
        $res = $pdo->prepare("UPDATE medicos set nome = :nome, especialidade = :especialidade, crm = :crm, cpf = :cpf, telefone = :telefone, email = :email, turno = :turno where id = :id");

        $res->bindValue(":nome", $nome);
        $res->bindValue(":especialidade", $especialidade);
        $res->bindValue(":crm", $crm);
        $res->bindValue(":cpf", $cpf);
        $res->bindValue(":telefone", $telefone);
        $res->bindValue(":email", $email);
        $res->bindValue(":turno", $turno);
        $res->bindValue(":id", $id);
        $res-> execute();
?>