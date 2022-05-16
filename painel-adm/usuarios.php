<?php $pagina = 'usuarios'; ?>

<div class="row botao-novo">
    <div class="col-md-12">
        <a id="btn-novo" data-toggle="modal" data-target="#modal">
        </a>
        <a href="index.php?acao=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-secondary">Novo Usuário</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">
            <label class="registro" for="exampleFormControlSelect1">Registros</label>
            <select class="form-control-sm" id="exampleFormControlSelect1">
                <option>10</option>
                <option>25</option>
                <option>50</option>
            </select>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="float-right mr-4">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control-sm mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="<?php echo $pagina; ?>"><i class="fas fa-search"></i></button>
            </form>
        </div>  
    </div>
</div>

<div class="table-responsive-sm mt-3">
    <table class="table table-sm">
    <thead class="thead-light">
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Usuario</th>
        <th scope="col">Senha</th>
        <th scope="col">Nível</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($_GET[$pagina]) and $_GET['txtbuscar'] != ''){
                $nome_buscar = '%'.$_GET['txtbuscar'].'%';
                $res = $pdo->prepare("SELECT * from usuarios where nome LIKE :nome order by nome asc");
                $res->bindValue(":nome", $nome_buscar);
                $res->execute();
            } else{
                $res = $pdo->query("SELECT * from usuarios order by nome asc");
            }

            // VÁRIAS LINHAS DE RESULTADO
            $dados = $res->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($dados); $i++){
                foreach ($dados[$i] as $key => $value){
                    
                }
                $id = $dados[$i]['id'];
                $nome = $dados[$i]['nome'];
                $usuario = $dados[$i]['usuario'];
                $senha_original = $dados[$i]['senha_original'];
                $nivel = $dados[$i]['nivel'];

            $linhas = count($dados);
        ?>

        <tr>
            <td><?php echo $nome ?></td>
            <td><?php echo $usuario ?></td>
            <td><?php echo $senha_original ?></td>
            <td><?php echo $nivel ?></td>
            <td><a href="index.php?acao=<?php echo $pagina ?>&funcao=editar&id=<?php echo $id ?>"><i class="fas fa-edit text-info"></i></a>
                <a href="index.php?acao=<?php echo $pagina ?>&funcao=excluir&id=<?php echo $id ?>"><i class="far fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        <?php } ?> <!-- FIM DO FOR -->
    </tbody>
    </table>
</div>

<!-- MODAL --> 
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <?php if(@$_GET['funcao'] == 'editar'){

                    $nome_botao = 'Editar';

                    $id_usuario = $_GET['id'];

                    // BUSCAR DADOS DO REGISTRO A SER EDITADO
                    $res = $pdo->query("select * from usuarios where id = '$id_usuario'");
                    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                    
                    $nome_usuario = $dados[0]['nome'];
                    $email_usuario = $dados[0]['usuario'];
                    $senha_usuario = $dados[0]['senha_original'];
                    $email_usuario_rec = $dados[0]['usuario'];

                    echo 'Editar Usuário'; 
                  }else{
                    $nome_botao = 'Salvar';
                    echo 'Cadastro de Usuários';
                  }
             ?>
        </h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" class="form-control" id="" placeholder="Insira o nome" name="nome" value="<?php echo @$nome_usuario ?>">
            </div>
        
            <div class="form-group">
                <label for="exampleFormControlInput1">E-mail</label>
                <input type="email" class="form-control" id="" placeholder="nome@exemplo.com" name="usuario" value="<?php echo @$email_usuario ?>">
            </div>

            <div class="form-group">
                <label for="">Senha</label>
                <input type="text" class="form-control" id="" placeholder="Insira a senha" name="senha" value="<?php echo @$senha_usuario ?>">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" name="<?php echo $nome_botao ?>" class="btn btn-success"><?php echo $nome_botao ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- CÓDIGO DA FUNÇÃO DO BOTÃO NOVO -->
<?php
    if(@$_GET['funcao'] == 'novo'){   
?>
    <script>
        $('#btn-novo').click();
    </script>
<?php
    }
?>

<!-- CÓDIGO DO BOTÃO SALVAR -->
 <?php
    if(isset($_POST['Salvar'])){
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $senha_cript = md5($senha);

        // VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO
        $res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
        $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
        $linhas = count($dados_c);
        if($linhas == 0){
            $res = $pdo->prepare("INSERT into usuarios (nome, usuario, senha, senha_original, nivel) values (:nome, :usuario, :senha, :senha_original, :nivel)");

            $res->bindValue(":nome", $nome);
            $res->bindValue(":usuario", $usuario);
            $res->bindValue(":senha", $senha_cript);
            $res->bindValue(":senha_original", $senha);
            $res->bindValue(":nivel", 'admin');
            $res-> execute();

            echo "<script language='javascript'>
                    window.location='index.php?acao=$pagina';
                </script>";
        } else{
            echo "<script language='javascript'>
                window.alert('Usuário já cadastrado.');
              </script>";
        }    
    }
 ?>

<!-- CÓDIGO DA FUNÇÃO DO BOTÃO EDITAR -->
<?php
    if(@$_GET['funcao'] == 'editar'){

?>

    <script>
        $('#btn-novo').click();
    </script>

<!-- CÓDIGO DO BOTÃO EDITAR -->
<?php
    if(isset($_POST['Editar'])){
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $senha_cript = md5($senha);

        // VERIFICAR SE O USUÁRIO JÁ ESTÁ CADASTRADO SOMENTE SE FOR EDITADO O USUARIO/EMAIL
        if($email_usuario_rec != $usuario){
            $res_c = $pdo->query("select * from usuarios where usuario = '$usuario'");
            $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
            $linhas = count($dados_c);
            if($linhas != 0){
                echo "<script language='javascript'>
                    window.alert('Usuário já cadastrado.');
                  </script>";
                  exit();
            }            
        }

        $res = $pdo->prepare("UPDATE usuarios set nome = :nome, usuario = :usuario, senha = :senha_cript, senha_original = :senha where id = :id");

            $res->bindValue(":nome", $nome);
            $res->bindValue(":usuario", $usuario);
            $res->bindValue(":senha", $senha);
            $res->bindValue(":senha_cript", $senha_cript);
            $res->bindValue(":id", $id_usuario);
            $res-> execute();

            echo "<script language='javascript'>
                        window.location='index.php?acao=$pagina';
                    </script>"; 
    }
 ?>

<?php        
    }
?>

<!-- CÓDIGO DA FUNÇÃO DO BOTÃO EXCLUIR -->
<?php
    if(@$_GET['funcao'] == 'excluir'){
        $id_usuario = $_GET['id'];

        $res = $pdo->query("DELETE from usuarios where id = '$id_usuario'");

        echo "<script language='javascript'>
                     window.alert('Registro Excluído.');
                  </script>";

        echo "<script language='javascript'>
                window.location='index.php?acao=$pagina';
            </script>"; 
    }
?>

<!--MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>