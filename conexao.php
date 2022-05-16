<?php

date_default_timezone_set('America/Sao_Paulo');

try{
    $pdo = new PDO("mysql:dbname=sysmedical;host=localhost", "root", "");
}catch (Exception $e){
    echo "Erro ao conectar com o banco de dados <br><br>".$e;
}

?>