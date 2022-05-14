<div class="row">
    <div class="col-md-12 botao-novo">
        <button type="button" class="btn btn-secondary">Novo Médico</button>
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
                <input class="form-control-sm mr-sm-2" type="search" placeholder="Nome ou CRM" aria-label="Pesquisar" name="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="<?php echo $item2; ?>"><i class="fas fa-search"></i></button>
            </form>
        </div>  
    </div>
</div>

<div class="table-responsive-sm mt-3">
    <table class="table table-sm">
    <thead class="thead-light">
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">Especialidade</th>
        <th scope="col">CRM</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Mark</td>
            <td>Clínico Geral</td>
            <td>@mdo</td>
            <td>(62) 0000-0000</td>
            <td><a href="#"><i class="fas fa-edit text-info"></i></a>
                <a href="#"><i class="far fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
    </tbody>
    </table>
</div>
