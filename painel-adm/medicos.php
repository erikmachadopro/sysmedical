<?php $pagina = 'medicos'; ?>

<div class="row">
    <div class="col-md-12 botao-novo">
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal">Novo Médico</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Médicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Insira o nome" name="nome" required>
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
                                <input type="text" class="form-control" id="crm" placeholder="Insira o CRM" name="crm" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF" name="cpf" required>
                            </div>                    
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira o celular" name="telefone" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">E-mail</label>
                        <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com" name="email" required>
                    </div>

                    <div id="mensagem" class="col-md-12 text-center mt-3">
                        
                    </div>
            </div> <!-- fim da modal-body -->    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button name="btn-salvar" id="btn-salvar" class="btn btn-success">Salvar</button>
                    </div>
                </form>
        </div> <!-- fim da modal-content  -->
    </div> <!-- fim da modal-dialog -->
</div> <!-- fim da modal  -->

<!-- MASCARAS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>

<!-- AJAX PARA INSERÇÃO DOS DADOS -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-salvar').click(function(event){
            event.preventDefault();
            $.ajax({
                url: "medicos/inserir.php",
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
        $.ajax({
            url: "medicos/listar.php",
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
        $('#btn-buscar').click(function(event){
            event.preventDefault();

            $.ajax({
                url: "medicos/listar.php",
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
