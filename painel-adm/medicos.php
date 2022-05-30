<?php $pagina = 'medicos'; ?>

<div class="row">
    <div class="col-md-12 botao-novo">
        <a id="btn-novo" data-toggle="modal" data-target="#modal">
        </a>
        <a href="index.php?acao=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-secondary">Novo Médico</a>
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
            <form class="form-inline my-2 my-lg-0" method="post">
                <input class="form-control-sm mr-sm-2" type="search" placeholder="Nome ou CRM" aria-label="Pesquisar" name="txtbuscar" id="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
            </form>
        </div>  
    </div>
</div>

<div id="listar">

</div> 

<!-- MODAL PARA CADASTRO --> 

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php if(@$_GET['funcao'] == 'editar'){

                        $nome_botao = 'Editar';

                        $id_registro = $_GET['id'];

                        // BUSCAR DADOS DO REGISTRO A SER EDITADO
                        $res = $pdo->query("select * from medicos where id = '$id_registro'");
                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                        $nome = $dados[0]['nome'];
                        $especialidade = $dados[0]['especialidade'];
                        $crm = $dados[0]['crm'];
                        $cpf = $dados[0]['cpf'];
                        $telefone = $dados[0]['telefone'];
                        $email = $dados[0]['email'];

                        echo 'Editar Médico'; 
                        }else{
                        $nome_botao = 'Salvar';
                        echo 'Cadastro de Médico';
                        }
                    ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <!-- CAMPO OCULTO PARA PEGAR O ID PARA EDIÇÃO -->
                                <input type="hidden"  id="id" name="id" value="<?php echo @$id_registro ?>">
                                <!-- CAMPO OCULTO PARA VALIDAÇÃO DO CPF PARA EDIÇÃO -->
                                <input type="hidden"  id="cpf_antigo" name="cpf_antigo" value="<?php echo @$cpf ?>">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Insira o nome" name="nome" value="<?php echo @$nome ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Especialidade</label>
                                <select class="form-control" id="especialidade" name="especialidade">
                                    <option>1</option>
                                </select>
                            </div>                    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="">CRM</label>
                                <input type="text" class="form-control" id="crm" placeholder="Insira o CRM" name="crm" value="<?php echo @$crm ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF" name="cpf" value="<?php echo @$cpf ?>" required>
                            </div>                    
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira o celular" name="telefone" value="<?php echo @$telefone ?>" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com" name="email" value="<?php echo @$email ?>" required>
                    </div>

                    <div id="mensagem" class="col-md-12 text-center mt-3">
                        
                    </div>
            </div> <!-- fim da modal-body -->    
                    <div class="modal-footer">
                        <button id="btn-fechar" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-success"><?php echo $nome_botao ?></button>
                    </div>
                </form>
        </div> <!-- fim da modal-content  -->
    </div> <!-- fim da modal-dialog -->
</div> <!-- fim da modal  -->

<!-- CHAMADA DA MODAL NOVO -->
<?php
    if(@$_GET['funcao'] == 'novo'){   
?>
    <script>
        $('#btn-novo').click();
    </script>
<?php
    }
?>

<!-- CHAMADA DA MODAL EDITAR -->
<?php
    if(@$_GET['funcao'] == 'editar'){   
?>
    <script>
        $('#btn-novo').click();
    </script>
<?php
    }
?>

<!-- MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>

<!-- AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        var pag = "<?=$pagina?>";
        $('#Salvar').click(function(event){
            event.preventDefault();
            $.ajax({
                url: pag + "/inserir.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){
                    $('#mensagem').removeClass()
                    if (mensagem =='Registro inserido com sucesso.') {
                        $('#mensagem').addClass('mensagem-sucesso')
                        
                        // LIMPAR CAMPOS APÓS CADASTRO
                        $('#nome').val('')
                        $('#crm').val('')
                        $('#cpf').val('')
                        $('#telefone').val('')
                        $('#email').val('')

                        // LIMPAR CAMPOS APÓS CADASTRO E ATUALIZAR REGISTROS
                        $('#txtbuscar').val('')
                        $('#btn-buscar').click();
                        // FECHAR MODAL APÓS CADASTRO E ATUALIZAR REGISTROS
                        //$('#btn-fechar').click();

                    }else{
                        $('#mensagem').addClass('mensagem-erro')
                    }
                    $('#mensagem').text(mensagem)
                },
            })
        })
    })
</script>

<!-- AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        var pag = "<?=$pagina?>";
        $.ajax({
            url: pag + "/listar.php",
            dataType: "html",
            success: function(result){
                $('#listar').html(result)   
            },
        })
    })
</script>

<!-- AJAX PARA BUSCAR DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        var pag = "<?=$pagina?>";
        $('#btn-buscar').click(function(event){
            event.preventDefault();

            $.ajax({
                url: pag + "/listar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "html",
                success: function(result){
                    $('#listar').html(result)   
                },
            })
        })
    })
</script>

<!-- AJAX PARA LISTAR DADOS ENQUANTO DIGITA A BUSCA -->
<script type="text/javascript">
    $('#txtbuscar').keyup(function(){
        $('#btn-buscar').click();
    })
</script>

<!-- AJAX PARA EDIÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        var pag = "<?=$pagina?>";
        $('#Editar').click(function(event){
            event.preventDefault();
            $.ajax({
                url: pag + "/editar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem){
                    $('#mensagem').removeClass()
                    if (mensagem =='Registro editado com sucesso.') {
                        $('#mensagem').addClass('mensagem-sucesso')
                        
                        // LIMPAR CAMPOS APÓS CADASTRO E ATUALIZAR REGISTROS
                        $('#txtbuscar').val('')
                        $('#btn-buscar').click();

                        // FECHAR MODAL APÓS CADASTRO E ATUALIZAR REGISTROS
                        $('#btn-fechar').click();

                    }else{
                        $('#mensagem').addClass('mensagem-erro')
                    }
                    $('#mensagem').text(mensagem)
                },
            })
        })
    })
</script>