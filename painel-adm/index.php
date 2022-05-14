<?php

$notificacoes = 3;

// VARIÁVEIS DOS MENUS
$item1 ='home';
$item2 = 'medicos';
$item3 = 'func';
$item4 = 'notificacoes';

// VERIFICAR SE O MENU CLICADO E PASSAR A CLASSE ATIVO
    if(@$_GET['acao'] == $item1){
        $item1ativo = 'active'; 
    } elseif(@$_GET['acao'] == $item2  or isset($_GET[$item2])){
        $item2ativo = 'active';
    } elseif(@$_GET['acao'] == $item3){
        $item3ativo = 'active';
    } elseif(@$_GET['acao'] == $item4){
        $item4ativo = 'active';
    } else{
        $item1ativo = 'active';
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Painel Administrativo</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="../css/painel.css">

        <!--REFERENCIA PARA O FAVICON -->
        <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../img/favicon/favicon2.ico" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>

    <body>
        <!-- NAVEGAÇÃO -->
        <nav class="navbar navbar-light bg-light">
            <div class="col-md-12">
                <img class="float-left" src="../img/logo-painel.png">
                <li class="float-right nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administrador - Erik Machado
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Sair</a>
                    </div>
                </li>
            </div>
        </nav>
        <!-- FIM DA NAVEGAÇÃO -->

        <!-- PAINEL -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-4">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link <?php echo $item1ativo ?>" id="link-home" href="index.php?acao=<?php echo $item1 ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-home mr-1"></i>Home</a>

                    <a class="nav-link <?php echo $item2ativo ?>" id="link-medicos" href="index.php?acao=<?php echo $item2 ?>" role="tab" aria-controls="v-pills-medicos" aria-selected="false"><i class="fas fa-user-md mr-1"></i>Cadastro de Médicos</a>

                    <a class="nav-link <?php echo $item3ativo ?>" id="link-funcionarios" href="index.php?acao=<?php echo $item3 ?>" role="tab" aria-controls="v-pills-funcionarios" aria-selected="false"><i class="fas fa-user mr-1"></i>Cadastro de Funcionários</a>

                    <?php if($notificacoes > 0){ ?> <!-- Somente aparecer notificações se for maior que 0 -->
                    <a class="nav-link <?php echo $item4ativo ?>" id="link-notificaoes" href="index.php?acao=<?php echo $item4 ?>" role="tab" aria-controls="v-pills-notificacoes" aria-selected="false"><i class="fas fa-exclamation-triangle mr-1"></i>Notificações <span class="badge badge-light"><?php echo $notificacoes; ?></span></a>
                    <?php } ?> <!-- encerramento de notificações -->
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" role="tabpanel">
                            <?php
                                if(@$_GET['acao'] == $item1){
                                    include_once($item1.".php"); 
                                } elseif(@$_GET['acao'] == $item2 or isset($_GET[$item2])){
                                    include_once($item2.".php");
                                } elseif(@$_GET['acao'] == $item3){
                                    include_once($item3.".php");
                                } elseif(@$_GET['acao'] == $item4){
                                    include_once($item4.".php");
                                } else{
                                    include_once($item1.".php");
                                }
                            ?>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DO PAINEL -->

    </body>
</html>


<?php
// EXECUTAR UM LINK HREF COM SCRIPT
/*
if(isset($_GET['btnbuscarMedicos'])){ 
?>
    <script type="text/javascript">
        $('#link-medicos').click();
    </script>

<?php 
    } */
?>

