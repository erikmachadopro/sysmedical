<?php

    include_once("../../conexao.php");

    $id = $_POST['id'];
   
    $res = $pdo->prepare("DELETE from medicos where id = :id");

    $res->bindValue(":id", $id);
    $res-> execute();
?>