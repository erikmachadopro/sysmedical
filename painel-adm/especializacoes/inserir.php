<?php

    require_once("../../conexao.php");

    $nome = $_POST['nome'];

    // VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO
    $res_c = $pdo->query("select * from especializacoes where nome = '$nome'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados_c);
    if($linhas == 0 || $nome != ""){
        $res = $pdo->prepare("INSERT into especializacoes (nome) values (:nome)");

        $res->bindValue(":nome", $nome);
       
        $res-> execute();

        echo "Registro inserido com sucesso.";
    } else{
        echo "Esta especialização já está cadastrada.";
    }    
    
?>