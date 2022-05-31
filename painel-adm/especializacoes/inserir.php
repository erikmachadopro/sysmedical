<?php

    require_once("../../conexao.php");

    $nome = $_POST['nome'];

    // VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO
    $res_c = $pdo->query("select * from especializacoes where nome = '$nome'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas = count($dados_c);

    // VALIDAÇÃO PARA NÃO SALVAR CAMPO VAZIO
    if($nome == ''){
        echo "Preencha o nome.";
        exit();
    }


    if($linhas == 0){
        $res = $pdo->prepare("INSERT into especializacoes (nome) values (:nome)");

        $res->bindValue(":nome", $nome);
       
        $res-> execute();

        echo "Registro inserido com sucesso.";
    } else{
        echo "Esta especialização já está cadastrada.";
    }    
    
?>