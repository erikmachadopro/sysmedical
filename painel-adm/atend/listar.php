<?php

    require_once("../../conexao.php");
    $pagina = 'recepcionistas'; 

    $txtbuscar = @$_POST['txtbuscar'];
    
    echo '<div class="table-responsive-sm mt-3">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>'; 

                $itens_por_pagina = $_POST['itens'];

                // PEGAR A PÁGINA ATUAL
                $pagina_pag = intval(@$_POST['pag']);
                $limite = $pagina_pag * $itens_por_pagina;

                // CAMINHO DA PAGINAÇÃO
                $caminho_pag = 'index.php?acao='.$pagina.'&';
        
                if($txtbuscar == ''){
                    $res = $pdo->query("SELECT * from recepcionistas order by id desc LIMIT $limite, $itens_por_pagina");
                }else{
                    $txtbuscar = '%'.@$_POST['txtbuscar'].'%';
                    $res = $pdo->query("SELECT * from recepcionistas where nome LIKE '$txtbuscar' or cpf = '$txtbuscar' order by id desc");
                }
                
                $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                // TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
                $res_todos = $pdo->query("SELECT * from recepcionistas");
                $dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
                $num_total = count($dados_total);

                // DEFINIR O TOTAL DE PÁGINAS
                $num_paginas = ceil($num_total/$itens_por_pagina);

                for ($i=0; $i < count($dados); $i++){
                    foreach ($dados[$i] as $key => $value){
                        
                    }
                    $id = @$dados[$i]['id'];
                    $nome = @$dados[$i]['nome'];
                    $cpf = @$dados[$i]['cpf'];
                    $telefone = @$dados[$i]['telefone'];
                    $turno = @$dados[$i]['turno'];
    
                echo '<tbody>
                        <tr>
                            <td>'.$nome.'</td>
                            <td>'.$cpf.'</td>
                            <td>'.$telefone.'</td>
                            <td>'.$turno.'</td>
                            <td><a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
                                <a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
                            </td>
                        </tr>';
                    } 
                echo '             
                    </tbody>
                </table> ';

                if($txtbuscar == ''){

               echo '
                <!-- AREA DA PAGINAÇÃO -->
                <nav class="paginacao" aria-label="Navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>';
                        
                            for($i=0; $i < $num_paginas; $i++){
                            $estilo = "";
                            if($pagina_pag == $i)
                            $estilo = "active";
                        
                        echo '<li class="page-item">
                                    <a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a>
                                </li>';      
                            } 
                    
                    echo '<li class="page-item">
                            <a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
        </div>'; 
    }
?>