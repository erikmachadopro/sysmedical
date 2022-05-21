<?php

    include_once("../../conexao.php");

    echo '<div class="table-responsive-sm mt-3">
            <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Especialidade</th>
                        <th scope="col">CRM</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>'; 
    
            $res = $pdo->query("SELECT * from medicos order by id desc");
            $dados = $res->fetchAll(PDO::FETCH_ASSOC);

            for ($i=0; $i < count($dados); $i++){
                foreach ($dados[$i] as $key => $value){
                    
                }
                $id = @$dados[$i]['id'];
                $nome = @$dados[$i]['nome'];
                $especialidade = @$dados[$i]['especialidade'];
                $crm = @$dados[$i]['crm'];
                $cpf = @$dados[$i]['cpf'];
                $telefone = @$dados[$i]['telefone'];
                $email = @$dados[$i]['email'];
  
          echo '<tbody>
                    <tr>
                        <td>'.$nome.'</td>
                        <td>'.$especialidade.'</td>
                        <td>'.$crm.'</td>
                        <td>'.$cpf.'</td>
                        <td>'.$telefone.'</td>
                        <td>'.$email.'</td>
                        <td><a href="#"><i class="fas fa-edit text-info"></i></a>
                            <a href="#"><i class="far fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>';
                } 
        echo '             
                </tbody>
            </table> 
        </div>';   
?>